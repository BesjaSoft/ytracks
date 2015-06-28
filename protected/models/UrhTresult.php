<?php

/*
 * Each page in this Source contains the results of one race.
 */

class UrhTresult extends Tresult {

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tresult the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @name readContent
     * @abstract reads the contenttable and converts them into tResult
     * there are a different implementations based on the source, so differences are
     * covered within the different classes.
     */
    public function readContent($key, $catId, $id = 0) {

        if ($id <> 0) {
            $this->list = Content::model()->findAll('id = :id', array('id' => $id));
        } else {
            $this->list = Content::model()->findAll('catid = :cat and title like \'race.php%.html\'', array('cat' => $catId));
        }

        echo 'Key : ' . $key . "\n";
        echo 'Category : ' . $catId . "\n";
        echo 'Id : ' . $id . "\n";
        echo 'Articles:' . count($this->list) . "\n";

        foreach ($this->list as $article) {
            echo 'article : ' . $article->title . '(' . $article->id . ')' . "\n";
            if (strtolower($article->title) <> 'aaastock.html' &&
                    strtolower($article->title) <> 'arcawinners.html' &&
                    strtolower($article->title) <> 'artgo.html' &&
                    strtolower($article->title) <> 'asawinners.html' &&
                    strtolower($article->title) <> 'bnswins.html' &&
                    strtolower($article->title) <> 'convwins.html' &&
                    strtolower($article->title) <> 'byyear.php.html' &&
                    strtolower($article->title) <> 'drivers.php.html' &&
                    strtolower($article->title) <> 'tracks.php.html' &&
                    strtolower($article->title) <> 'credits.html' &&
                    strtolower($article->title) <> 'default.html' &&
                    strtolower($article->title) <> 'helpwanted.html' &&
                    strtolower($article->title) <> 'index.html' &&
                    strtolower($article->title) <> 'links.html' &&
                    strtolower($article->title) <> 'nascarga.html'
            ) {
                $text = $article->introtext . $article->fulltext;
                $lines = explode(chr(13), $text);

                // booleans
                $event = false;
                $table = false;
                $round = new stdClass();
                $notes = false;

                // string
                $resultTable = '';
                $roundType = '';

                // arrays
                $linenum = 0;
                $results = array();
                if (count($lines) > 1) {
                    try {
                        foreach ($lines as $line) {
                            $line = preg_replace('/\&nbsp\;/', ' ', $line);

                            if (strpos(strtolower($line), '<font') !== false) {
                                // event:
                                $event = true;
                                $round->event_name = strip_tags($line);
                            } elseif (!$table && strpos(strtolower($line), '<a href="') !== false) {
                                // track:
                                $round->track_name = strip_tags($line);
                            } elseif (strpos(strtolower($line), '<table') !== false) {
                                // result table:                       
                                $table = true;
                                $resultTable = $line;
                            } elseif ($table && strpos(strtolower($line), '</table') !== false) {
                                // end of result table
                                $resultTable = $resultTable . $line;
                                $table = false;

                                // convert the Seasontable into an xml-document
                                unset($results);
                                $results = $this->table2array($resultTable, true);
                                //print_r($results);
                                //print_r($round);
                                //die;
                            } elseif ($table) {
                                $resultTable = $resultTable . $line;
                            } else {
                                $line = trim(strip_tags($line));
                                if (!empty($line)) {

                                    if (strpos(strtolower($line), 'pole speed') !== false) {
                                        //echo 'pole sp : ' . trim($line) . "\n";
                                    } elseif (strpos(strtolower($line), 'time of race') !== false) {
                                        //echo 'tor : ' . trim($line) . "\n";
                                    } elseif (strpos(strtolower($line), 'average speed') !== false) {
                                        //echo 'av sp : ' . trim($line) . "\n";
                                    } elseif (strpos(strtolower($line), 'attendance') !== false) {
                                        //echo 'attn : ' . trim($line) . "\n";
                                    } elseif (strpos(strtolower($line), 'caution') !== false) {
                                        //echo 'cautions : ' . trim($line) . "\n";   
                                    } elseif ($linenum == 0) {
                                        $round->championship = trim($line);
                                        //echo 'chmp:' . $linenum . ', line : ' . trim($line) . "\n";
                                    } elseif ($linenum == 1) {
                                        //$date = DateTime::createFromFormat('F j, Y', 'August 16, 1992');
                                        $date = DateTime::createFromFormat('F j, Y', trim($line));
                                        $round->date = $date;
                                        //echo 'Date : ' . $date->format('d-m-Y').  ' (' . $linenum . ', line : ' . trim($line) . ')' . "\n";
                                    } elseif (strpos(strtolower($line), 'laps') !== false) {
                                        //echo 'laps : ' . trim($line) . "\n";   
                                    } elseif (strpos(strtolower($line), 'notes') !== false) {
                                        $notes = true;
                                        //echo 'laps : ' . trim($line) . "\n";   
                                    } elseif (strpos(strtolower($line), 'race purse') !== false) {
                                        //echo 'laps : ' . trim($line) . "\n";   
                                    } else {
                                        echo 'onbepaald : ' . $line . "\n";
                                        //die;
                                    }
                                    $linenum = $linenum + 1;
                                }
                            }
                        }
                    } catch (Exception $ex) {
                        echo $ex->getMessage() . "\n";
                        die;
                    }
                }
            }
        }
    }

}

?>
