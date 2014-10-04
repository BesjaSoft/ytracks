<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RallybaseTresult
 *
 * @author fred
 */
class RallybaseTresult extends Tresult {

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tresult the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function convertRallybaseDrivers($key, $sectionId, $catId) {

        $this->list = Content::model()->findAll('t.catid=:catid and t.sectionid=:sectionid and t.fulltext like \'%Drivers and codrivers from%\'', array(
            'catid' => $catId, 'sectionid' => $sectionId)
        );

        echo 'Found : ' . count($this->list) . ' articles' . "\n";

        foreach ($this->list as $article) {
            // echo 'article : ' . $article->title . "\n";
            $text = $article->introtext . $article->fulltext;
            $lines = explode('<table', $text);

            // some booleans to help reading the content:
            $rally = false;
            $header = false;
            $table = false;
            $country = null;
            $countryName = null;
            $countryCode = null;
            $line = null;
            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {
                        // we only need the table with the rallies:
                        //echo 'pos : '.strpos(strtolower($line),'list of available rallies')."\n";
                        //echo 'line : '.substr($line, 1, 100)."\n";
                        if (strpos(strtolower($line), 'matches found') > 0) {
                            $headerStart = strpos($line, '<h1>') + strlen('Drivers and codrivers from') + 4;
                            $headerEnd = strpos($line, '</h1>');
                            $countryName = $this->convertCountryName(trim(substr($line, $headerStart, $headerEnd - $headerStart)));
                            $country = Country::model()->find('name=:name', array(
                                'name' => $countryName));
                            if (!empty($country->id)) {
                                echo 'article : ' . $article->title . ', country : ' . $countryName . ', id : ' . $country->id . "\n";
                            } else {
                                echo 'article : ' . $article->title . ', country : ' . $countryName . ' not found!' . "\n";
                                die;
                            }
                            $header = true;
                        } elseif ($header) {
                            $endOfTable = strpos($line, '</table>');
                            $table = '<table ' . substr($line, 1, $endOfTable + 8);
                            $drivers = $this->table2array($table, false);

                            foreach ($drivers as $driver) {
                                $fullName = trim(strip_tags($driver[1]));
                                //echo 'driver : '.$fullName."\n";
                                $posComma = strpos($fullName, ',');
                                $lastName = trim(substr($fullName, 0, $posComma));
                                $firstName = trim(substr($fullName, $posComma + 1));

                                $criteria = new CDbCriteria;
                                $criteria->compare('first_name', $firstName);
                                $criteria->compare('last_name', $lastName);
                                $criteria->compare('nationality', $country->iso3);
                                $individual = Individual::Model()->find($criteria);
                                if (!empty($individual->id)) {
                                    //echo '==> Found! firstname : ' . $firstName . ', lastname : ' . $lastName . ', country : ' . $country->iso3 . "\n";
                                } else {
                                    $individual = new Individual();
                                    $individual->first_name = $firstName;
                                    $individual->last_name = $lastName;
                                    $individual->nationality = $country->iso3;
                                    $individual->published = 1;
//$individual->ordering = 1;
                                    if (!$individual->save()) {
                                        echo '=> Error firstname : ' . $firstName . ', lastname : ' . $lastName . ', country : ' . $country->iso3 . "\n";
                                        print_r($individual->getErrors());
                                        die;
                                    } else {
                                        echo 'Added! firstname : ' . $firstName . ', lastname : ' . $lastName . ', country : ' . $country->iso3 . "\n";
                                    }
                                }
                            }
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex;
                    echo $ex->getMessage() . "\n";
//echo 'line:' . $line . "\n";
                    die;
                }
            } else {
                echo 'Just 1 line!' . "\n";
//echo 'text : '.$text;
            }
        }
    }

    public function convertRallybaseRallies($key, $sectionId, $catId) {

        $this->list = Content::model()->findAll('t.catid=:catid and t.sectionid=:sectionid and t.fulltext like \'%List of available rallies%\'', array(
            'catid' => $catId, 'sectionid' => $sectionId)
        );

        foreach ($this->list as $article) {
            echo 'article : ' . $article->title . "\n";
            $text = $article->introtext . $article->fulltext;
            $lines = explode('<table', $text);
            $line = null;
// some booleans to help reading the content:
            $rally = false;
            $header = false;
            $table = false;

            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {
// we only need the table with the rallies:
//echo 'pos : '.strpos(strtolower($line),'list of available rallies')."\n";
//echo 'line : '.substr($line, 1, 100)."\n";
                        if (strpos(strtolower($line), 'list of available rallies') > 0) {
                            $header = true;
                        } elseif ($header) {
                            $endOfTable = strpos($line, '</table>');
                            $table = '<table ' . substr($line, 1, $endOfTable + 8);
                            $events = $this->table2array($table);
                            foreach ($events as $event) {
//echo 'event : '.strip_tags($event['Rally']).'-'.$event['Country']."\n";
                                $eventName = strip_tags($event['Rally']);
                                $criteria = new CDbCriteria;
                                $criteria->compare('name', $eventName);
                                $record = Event::model()->find($criteria);
                                if (empty($record->id)) {
                                    $record = new Event();
                                    $record->name = $eventName;
                                    $record->country_code = $this->convertCountryCode(strtoupper($event['Country']));
                                    $record->published = 1;
                                    $record->ordering = 1;
                                    if (!$record->save()) {
                                        echo 'event : ' . strip_tags($event['Rally']) . '-' . $event['Country'] . "\n";
                                        print_r($record->getErrors());
                                    }
                                }
                            }
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";
                    echo 'line:' . $line . "\n";
                }
            } else {
                echo 'Just 1 line!' . "\n";
                //echo 'text : '.$text;
            }
        }
    }

    public function convertRallybaseChampionships($key, $sectionId, $catId) {

        $this->list = Content::model()->findAll('t.catid=:catid and t.sectionid=:sectionid and t.fulltext like \'%Results by championship%\'', array(
            'catid' => $catId, 'sectionid' => $sectionId)
        );

        echo 'Found : ' . count($this->list) . ' articles' . "\n";
        foreach ($this->list as $article) {
            echo 'article : ' . $article->title . "\n";
            $text = $article->introtext . $article->fulltext;
            $lines = explode('<table', $text);
            //
            $rally = false;
            $header = false;
            $table = false;
            $country = null;
            $countryName = null;
            $countryCode = null;
            $line = null;
            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {
//echo 'line:'.substr($line,1,80). "\n";
                        if (strpos(strtolower($line), 'results by championship') > 0) {
                            $header = true;
//echo 'header!'."\n";
                        } elseif ($header) {
                            $endOfTable = strpos($line, '</table>');
                            $table = '<table ' . substr($line, 1, $endOfTable + 8);
                            $championships = $this->table2array($table, true);
//print_r(array_keys($championships));
                            foreach ($championships as $championship) {
                                print_r($championship);
                            }
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex;
                    echo $ex->getMessage() . "\n";
//echo 'line:' . $line . "\n";
                    die;
                }
            } else {
                echo 'Just 1 line!' . "\n";
//echo 'text : '.$text;
            }
        }
    }

}
