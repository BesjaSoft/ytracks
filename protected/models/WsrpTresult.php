<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WsrpTresult
 *
 * @author fred
 */
class WsrpTresult extends Tresult {

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
     */
    public function readContent($key, $catId) {

        $this->list = Content::model()->findAll('catid = :cat', array('cat' => $catId));

        echo 'Key : ' . $key . "\n";
        echo 'Category : ' . $catId . "\n";
        echo 'Articles:' . count($this->list) . "\n";

        foreach ($this->list as $article) {
            echo 'article : ' . $article->title . "\n";

            $this->round = 0;
            //
            $text = $article->introtext . $article->fulltext;
            $lines = explode(chr(13), $text);

            // booleans
            $season = false;
            $result = false;
            $round = false;
            // string
            $roundType = '';
            // arrays
            $rounds = array();
            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {

                        // do the right stuff...
                        // ============================================================
                        // line belongs to the project
                        if (strpos(strtolower($line), '<a name="top"') > 0) {
                            // Get the project
                            $project = strip_tags($line);
                            $this->addProject($project, $article->title);

                            // ============================================================
                            // start of the season table
                        } elseif (!$season && strpos(strtolower($line), 'class="season"') > 0) {
                            // the rounds in the season
                            $season = true;
                            $seasonTable = $line;

                            // ============================================================
                            // end of the season table
                        } elseif ($season && strpos(strtolower($line), '</table>') > 0) {
                            // end of season table
                            $seasonTable = $seasonTable . $line;
                            $season = false;

                            // convert the Seasontable into an xml-document
                            unset($rounds);
                            $rounds = $this->table2array($seasonTable, true);
                            //
                            // now do something usefull with the rounds within the table

                            $this->addRounds($rounds);

                            // ============================================================
                            // start of the result table
                        } elseif (!$season && strpos(strtolower($line), '<table') > 0 && strpos(strtolower($line), 'cellspacing') > 0 && strpos(strtolower($line), 'cellpadding') > 0
                        ) {

                            $result = true;
                            $resultTable = $line;

                            // ============================================================
                            // end of the result table
                        } elseif ($result && strpos(strtolower($line), '</table>') > 0) {

                            $resultTable = $resultTable . $line;
                            $result = false;
                            // convert the resultTable into an xml-document
                            unset($results);
                            $results = $this->table2array($resultTable, true);

                            // now do something smart with the data....
                            $this->addResults($article, $rounds, $this->round, $results, $roundType);
                            $roundType = '';
                            // ============================================================
                            // start of the current round table
                        } elseif (!$round && strpos(strtolower($line), 'class="race"') > 0) {

                            $round = true;
                            $roundTable = $line;

                            // ============================================================
                            // end of the current round table
                        } elseif ($round && strpos(strtolower($line), '</table>') > 0) {

                            $roundTable = $roundTable . $line;
                            $round = false;
                            // convert the current roundtable into an xml-document
                            $currentRound = $this->table2array($roundTable, false);
                            // ============================================================
                        } elseif (strpos(strtolower($line), '<h2 class="brown"') > 0) {
                            $roundType = strip_tags($line);
                            // add the line to the field which has to be interpreted
                        } elseif ($result) {
                            $resultTable = $resultTable . $line;
                        } elseif ($season) {
                            $seasonTable = $seasonTable . $line;
                        } elseif ($round) {
                            if (strpos(strtolower($line), 'class="thround"') > 0) {
                                $this->round++;
                                $this->subround = 0;
                            }
                            $roundTable = $roundTable . $line;
                        }
                    } // foreach
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";
                    echo 'project:' . $project . "\n";
                }
            } // count($lines)
        } // foreach list

        echo 'results : ' . $this->results . "\n";
        echo 'found   : ' . $this->found . "\n";
        echo 'added   : ' . $this->added . "\n";
        echo '******** end of convert results **********' . "\n";
    }

}
