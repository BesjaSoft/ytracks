<?php

class Tresult extends BaseModel {

    public $cnt = 0;
    private $project = null;
    private $found = 0;
    private $added = 0;
    private $updated = 0;
    private static $classifications = array('DNS', 'DNF', 'DNA', 'DNP', 'DND', 'DNQ');
    private static $noValidResults = array('in entry list:',
        'in entry list only:',
        'did not start:',
        'did not finish:',
        'did not qualify:',
        'disqualified:',
        'did not practice:',
        'other starters:',
        'not classified:',
        'running in practice:',
        'prequalifying:',
        'other starters:',
    );

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{tracks_tresults}}';
    }

    public function rules() {
        return array(
            array('round', 'required'),
            array('row, subround_id, make_id, type_id, vehicle_id, engine_id, team_id, driver_id, codriver_id, deleted, error',
                'numerical', 'integerOnly' => true),
            array('round, num, tdriver, tcodriver, tvehicle, tteam, laps, performance, classification, raceclass, grid, laptime, Livery',
                'length',
                'max' => 255),
            array('Field4Question, Field4Or, Field4Evo, Field4_2', 'length', 'max' => 10),
            array('individuals', 'safe'),
            array('id, round, rounddate, num, individuals, tvehicle, tteam, laps, performance, classification, raceclass, grid, laptime, Livery, Field4Question, Field4Or, Field4Evo, Field4_2, subround_id, make_id, type_id, vehicle_id, engine_id, team_id, deleted',
                'safe', 'on' => 'search'),
            // foreign key checks:
            array('subround_id', 'exist', 'attributeName' => 'id', 'className' => 'Subround'),
            array('content_id', 'exist', 'attributeName' => 'id', 'className' => 'Content'),
            array('team_id', 'exist', 'attributeName' => 'id', 'className' => 'Team'),
            array('make_id', 'exist', 'attributeName' => 'id', 'className' => 'Make'),
            array('type_id', 'exist', 'attributeName' => 'id', 'className' => 'Type'),
            array('vehicle_id', 'exist', 'attributeName' => 'id', 'className' => 'Vehicle'),
            array('engine_id', 'exist', 'attributeName' => 'id', 'className' => 'Engine'),
            array('driver_id', 'exist', 'attributeName' => 'id', 'className' => 'Individual'),
            array('codriver_id', 'exist', 'attributeName' => 'id', 'className' => 'Individual'),
        );
    }

    public function relations() {
        return array(
            'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
            'subround' => array(self::BELONGS_TO, 'Subround', 'subround_id'),
            'make' => array(self::BELONGS_TO, 'Make', 'make_id'),
            'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
            'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicle_id'),
            'team' => array(self::BELONGS_TO, 'Team', 'team_id'),
            'engine' => array(self::BELONGS_TO, 'Engine', 'engine_id'),
            'results' => array(self::HAS_MANY, 'Result', 'tresult_id'),
            'trindividuals' => array(self::HAS_MANY, 'TresultIndividual', 'result_id'),
            'trstat' => array(self::STAT, 'TresultIndividual', 'result_id'),
            'driver' => array(self::BELONGS_TO, 'Individual', 'driver_id'),
            'codriver' => array(self::BELONGS_TO, 'Individual', 'codriver_id'),
        );
    }

    public function behaviors() {
        return array(
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'content_id' => Yii::t('app', 'Article'),
            'round' => Yii::t('app', 'Round'),
            'rounddate' => Yii::t('app', 'Date'),
            'sub' => Yii::t('app', 'Sub'),
            'row' => Yii::t('app', 'Row'),
            'num' => Yii::t('app', 'Num'),
            'individuals' => Yii::t('app', 'Individuals'),
            'tdriver' => Yii::t('app', 'Tdriver'),
            'tcodriver' => Yii::t('app', 'Tcodriver'),
            'tvehicle' => Yii::t('app', 'Tvehicle'),
            'tchassis' => Yii::t('app', 'Tchassis'),
            'tteam' => Yii::t('app', 'Tteam'),
            'laps' => Yii::t('app', 'Laps'),
            'performance' => Yii::t('app', 'Performance'),
            'classification' => Yii::t('app', 'Classification'),
            'raceclass' => Yii::t('app', 'Raceclass'),
            'grid' => Yii::t('app', 'Grid'),
            'laptime' => Yii::t('app', 'Laptime'),
            'Livery' => Yii::t('app', 'Livery'),
            'Field4Question' => Yii::t('app', 'Field4 Question'),
            'Field4Or' => Yii::t('app', 'Field4 Or'),
            'Field4Evo' => Yii::t('app', 'Field4 Evo'),
            'Field4_2' => Yii::t('app', 'Field4 2'),
            'subround_id' => Yii::t('app', 'Subround'),
            'make_id' => Yii::t('app', 'Make'),
            'type_id' => Yii::t('app', 'Type'),
            'vehicle_id' => Yii::t('app', 'Vehicle'),
            'engine_id' => Yii::t('app', 'Engine'),
            'team_id' => Yii::t('app', 'Team'),
            'driver_id' => Yii::t('app', 'Driver'),
            'codriver_id' => Yii::t('app', 'Co-driver'),
            'deleted' => Yii::t('app', 'Deleted'),
            'error' => Yii::t('app', 'Error'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('round', $this->round, true);
        $criteria->compare('rounddate', $this->rounddate, true);
        $criteria->compare('num', $this->num, true);
        $criteria->compare('individuals', $this->individuals, true);
        $criteria->compare('tdriver', $this->tdriver, true);
        $criteria->compare('tcodriver', $this->tcodriver, true);
        $criteria->compare('tvehicle', $this->tvehicle, true);
        $criteria->compare('tteam', $this->tteam, true);
        $criteria->compare('laps', $this->laps, true);
        $criteria->compare('performance', $this->performance, true);
        $criteria->compare('classification', $this->classification, true);
        $criteria->compare('raceclass', $this->raceclass, true);
        $criteria->compare('grid', $this->grid, true);
        $criteria->compare('laptime', $this->laptime, true);
        $criteria->compare('Livery', $this->Livery, true);
        $criteria->compare('Field4Question', $this->Field4Question, true);
        $criteria->compare('Field4Or', $this->Field4Or, true);
        $criteria->compare('Field4Evo', $this->Field4Evo, true);
        $criteria->compare('Field4_2', $this->Field4_2, true);
        $criteria->compare('error', $this->error, true); //array(1,2,3,4,5,6));
        $criteria->compare('deleted', 0);

        //$criteria->order = 'round,row';

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'Pagination' => array('pageSize' => 20,),
        ));
    }

    /**
     * function : export
     * purpose : exports the tresult to the result-table
     * */
    public function export($tresult) {
        if (!is_object($tresult)) {
            $tresult = Tresult::model()->findByPk($tresult);
        }
        $return = true;
        $raceclass = new Raceclass();
        $outreason = new Outreason();

        //
        if ($tresult->num == '-') {
            $tresult->num = null;
        } else if (in_array(trim(strtolower($tresult->num)), self::$noValidResults)) {
            $tresult->deleted = 1;
            return $tresult->save();
        }

        // ====
        // Export the Tresults into Results
        $trindividuals = $tresult->trindividuals;
        $raceclass_id = null;
        foreach ($trindividuals as $trindividual) {

            // Get the raceclass:
            $raceclass = null;
            if (isset($tresult->raceclass)) {
                $raceclass = Raceclass::model()->find('name=:name', array(':name' => $tresult->raceclass));
            }
            // Get the outreason:
            $outreason = null;
            $performance = null;
            if (isset($tresult->performance)) {
                $slash = strpos($tresult->performance, '/');
                $searchReason = $tresult->performance;
                if ($slash > 0) {
                    $performance = substr($tresult->performance, 0, $slash - 1);
                    $searchReason = substr($tresult->performance, $slash);
                }
                $outreason = Outreason::model()->find('name=:name', array(':name' => $searchReason));
            }
            // check if the team_id is not null.
            if (empty($tresult->team_id)) {
                $tresult->team_id = $this->findTeam($tresult);
                $tresult->save();
            }

            if (empty($tresult->subround_id)) {
                $tresult->subround_id = $this->findSubround($tresult);
                $tresult->save();
            }

            if (empty($tresult->make_id)) {
                $vehicle = $this->findVehicle($tresult);
                $tresult->make_id = $vehicle->make_id;
                $tresult->type_id = $vehicle->type_id;
                $tresult->vehicle_id = $vehicle->vehicle_id;
                $tresult->save();
            }

            if (empty($tresult->subround_id) || empty($tresult->team_id) || empty($trindividual->individual->id) || empty($tresult->make_id) || (!empty($tresult->chassis) && empty($tresult->vehicle_id))
            ) {
                $tresult->error = 5;
                $tresult->save();
                $return = false;
            } else {
                // try to find the result:
                $criteria = new CDbCriteria();
                $criteria->condition = 'individual_id=:individual and team_id=:team and subround_id=:subround and rank=:rank';
                $criteria->params = array(
                    'individual' => $trindividual->individual->id,
                    'team' => $tresult->team_id,
                    'subround' => $tresult->subround_id,
                    'rank' => $tresult->row,
                );

                $result = Result::model()->find($criteria);
                // create the result record if not found
                if (empty($result->id)) {
                    //echo'Na afvraging';
                    $result = new Result();
                    // set the values
                    //debug($data);
                    $result->subround_id = $tresult->subround_id;
                    $result->individual_id = $trindividual->individual->id;
                    $result->team_id = $tresult->team_id;
                    $result->make_id = $tresult->make_id;
                    $result->type_id = $tresult->type_id;
                    $result->vehicle_id = $tresult->vehicle_id;
                    $result->tresult_id = $tresult->id;
                    if (!empty($raceclass)) {
                        $result->raceclass_id = $raceclass->id;
                    }
                    $result->number = $tresult->num;
                    $result->rank = $tresult->row;
                    $laps = trim($tresult->laps);
                    if (!empty($laps) && ord($laps) != 194) {
                        $result->laps = $tresult->laps;
                    }
                    if (!empty($performance)) {
                        $result->performance = $performance;
                    } else {
                        if (strlen($tresult->performance) > 30) {
                            $result->comment = $tresult->performance;
                        } else {
                            $result->performance = $tresult->performance;
                        }
                    }
                    $result->classification = str_replace('.', '', $tresult->classification);
                    $result->checked_out = 0;
                    if (is_object($outreason)) {
                        $result->outreason_id = $outreason->id;
                    }

                    // resultaat opslaan
                    if (!$result->save()) {
                        print_r($result->getErrors());
                        $tresult->error = 3;
                        $tresult->save();
                        $return = false;
                    }
                } else {
                    $result->tresult_id = $tresult->id;
                    $result->performance = $this->setValue($result->performance, $performance);
                    $result->make_id = $this->setValue($result->make_id, $tresult->make_id);

                    if (empty($result->type_id) || $result->type_id != $tresult->type_id)
                        $result->type_id = $tresult->type_id;
                    if (empty($result->vehicle_id) || $result->vehicle_id != $tresult->vehicle_id)
                        $result->vehicle_id = $tresult->vehicle_id;
                    if (empty($result->licenseplate) || $result->licenseplate != $tresult->tlicenseplate)
                        $result->licenseplate = $tresult->tlicenseplate;
                    if (is_object($outreason)) {
                        if (empty($result->outreason_id) || $result->outreason_id != $outreason->id)
                            $result->outreason_id = $outreason->id;
                    }
                    // resultaat opslaan
                    if (!$result->save()) {
                        print_r($result->getErrors());
                        $tresult->error = 6;
                        $tresult->save();
                        $return = false;
                    }
                }
            }
        }
        if ($return) {
            // ====
            // Check the participants and add if necessary
            $subround = Subround::model()->findByPk($tresult->subround_id);
            foreach ($trindividuals as $trindividual) {

                $criteria = new CDbCriteria();
                $criteria->condition = 'individual_id=:individual and team_id=:team and project_id=:project';
                $criteria->params = array('individual' => $trindividual->individual->id,
                    'team' => $tresult->team_id,
                    'project' => $subround->round->project_id
                );

                $found = Participant::model()->findAll($criteria);

                if (count($found) == 0) {
                    $participant = new Participant();
                    $participant->project_id = $subround->round->project_id;
                    $participant->individual_id = $trindividual->individual->id;
                    $participant->team_id = $tresult->team_id;
                    $participant->number = $tresult->num;
                    $participant->raceclass_id = $raceclass_id;
                    // resultaat opslaan
                    if (!$participant->save()) {
                        $tresult->error = 4;
                        $tresult->save();
                    }
                }
            }
        }

        return $return;
    }

    private function setValue($old, $new) {
        $value = $old;
        if (empty($old) || $new != $old) {
            $value = $new;
        }

        return $value;
    }

    public static function addIndividuals($tresult, $add = false) {
        if (!is_object($tresult)) {
            $tresult = Tresult::model()->findByPk($tresult);
        }
        if (!$tresult->checkResult()) {
            return true;
        }

        $tindividuals = explode(';', $tresult->individuals);
        $individual = new Individual();
        $tresultIndividual = new TresultIndividual();
        $return = true;

        $tindividuals = array_map('trim', $tindividuals);

        // sometimes more than once the same name appears
        // here we try to detect this situation:
        $matchingIndividuals = array_count_values($tindividuals);
        $ordering = 0;
        $matchOrdering = false;

        //print_r($matchingIndividuals);	

        foreach ($tindividuals as $tindividual) {
            // some initial resetting:
            $classification = '';
            $nickname = NULL;
            $isNickname = false;
            $nationality = NULL;


            // check the number of matching individuals:
            $count = $matchingIndividuals[$tindividual];
            if ($count >= 2) {
                $matchOrdering = true;
                // this is the only multiple equally named individuals covered!
                $ordering++;
                //print_r($matchOrdering);
            }

            // break his name into an alias
            // remove the classification in the front or at the back
            $tindividual = trim($tindividual);
            if (in_array(substr($tindividual, 0, 3), self::$classifications)) {
                $classification = substr($tindividual, 0, 3);
                $tindividual = trim(substr($tindividual, 6));
            } else if (in_array(substr($tindividual, -1, 3), self::$classifications)) {
                $classification = substr($tindividual, -1, 3);
                $tindividual = trim(substr($tindividual, -5));
            }

            // Poging om het land weg te krijgen...
            $haakje = strpos($tindividual, '(');
            if ($haakje != false) {
                $haakje2 = strpos($tindividual, ')');
                $nationality = substr($tindividual, $haakje + 1, ($haakje2 - $haakje - 1));
                $tindividual = trim(substr($tindividual, 0, $haakje - 1));
            }

            $fullNameCriteria = new CdbCriteria;
            $fullNameCriteria->compare('trim(concat(first_name, " ", last_name))', $tindividual);
            if ($matchOrdering) {
                $fullNameCriteria->compare('ordering', $ordering);
            }
            $fullNameCriteria->order = 'id';
            $individual = Individual::model()->find($fullNameCriteria);

            // search on nickname
            if (empty($individual->id) && substr($tindividual, 0, 1) == '"' && substr($tindividual, -1) == '"'
            ) {
                $isNickname = true;
                $nickname = substr($tindividual, 1, strlen($tindividual) - 2);
                $individual = Individual::model()->find('nickname=:name', array(
                    'name' => $nickname));
            }
            // search on lastname
            if (empty($individual->id)) {
                $lastNameCriteria = new CDbCriteria;
                $lastNameCriteria->compare('last_name', $tindividual);
                if ($matchOrdering) {
                    $lastNameCriteria->compare('ordering', $ordering);
                }
                $lastNameCriteria->order = 'id';
                //print_r($lastNameCriteria);                
                $individual = Individual::model()->find($lastNameCriteria);
            }

            // individual not found? Then try the alias...
            if (empty($individual->id)) {
                $aliasCriteria = new CDbCriteria;
                $aliasCriteria->compare('alias', $tresult->getSlug($tindividual));
                if ($matchOrdering) {
                    $aliasCriteria->compare('ordering', $ordering);
                }
                $aliasCriteria->order = 'id';
                $individual = Individual::model()->find($aliasCriteria);
            }

            // Still not found? Then add it...
            if (empty($individual->id) && $add) {
                // try to split the name on the first space: if there is any
                // the first part is considered to be the firstname, the
                // last part the last name. If there isn´t any, it is considered to be
                // the lastname:
                if ($isNickname) {
                    $first_name = null;
                    $last_name = null;
                } else {
                    $firstSpacePosition = strpos($tindividual, ' ');
                    if ($firstSpacePosition != false) {
                        $first_name = trim(substr($tindividual, 0, $firstSpacePosition));
                        $last_name = trim(substr($tindividual, $firstSpacePosition + 1));
                    } else {
                        $first_name = null;
                        $last_name = $tindividual;
                    }
                }
                $individual = new Individual();
                //echo 'f:'.$first_name."\n";
                //echo 'l:'.$last_name."\n";
                //echo 'n:'.$nationality."\n";

                $individual->first_name = $first_name;
                $individual->last_name = $last_name;
                $individual->nickname = $nickname;
                $individual->nationality = $nationality;
                $individual->published = 1;
                if (!$individual->save()) {
                    print_r($individual->getErrors());
                }
            }

            if (!empty($individual->id)) {

                $criteria = new CDbCriteria();
                $criteria->condition = 'individual_id=:individual and result_id=:result';
                $criteria->params = array(':individual' => $individual->id, ':result' => $tresult->id);

                $found = TresultIndividual::model()->count($criteria);

                if ($found == 0) {
                    $tresultIndividual = new TresultIndividual();
                    $tresultIndividual->individual_id = $individual->id;
                    $tresultIndividual->result_id = $tresult->id;
                    $tresultIndividual->classification = $classification;
                    if (!$tresultIndividual->save()) {
                        $tresult->error = 1;
                        $tresult->save();
                        $return = false;
                    }
                }
            }
        }


        if (in_array(strtolower($tresult->num), array('in entry list:',
                    'in entry list only:',
                    'did not start:',
                    'did not finish:',
                    'disqualified:',
                    'did not practice:',
                    'other starters:',
                    'not classified:',
                    'did not qualify:',
                    'prequalifying:'
                ))) {
            $return = true;
        } else {

            $criteria = new CDbCriteria();
            $criteria->condition = 'result_id=:result';
            $criteria->params = array(':result' => $tresult->id);

            $found = TresultIndividual::model()->findAll($criteria);

            if (count($found) != count($tindividuals)) {
                $tresult->error = 2;
                $tresult->save();
                $return = false;
            }
        }

        return $return;
    }

    public function addResultToTable() {

        $this->printStartTijd();
        $catid = 5;
        $sectionid = 2;
        $list = Content::model()->findAll('catid=:catid and sectionid=:sectionid', array(
            'catid' => $catid, 'sectionid' => $sectionid));

        foreach ($list as $item) {
            //
            $text = $item->fulltext;
            if (empty($item->fulltext)) {
                $text = $item->introtext;
            }
            $cnt = 0;
            $result = false;
            $lines = explode(chr(13), $text);
            if (count($lines) > 1) {
                foreach ($lines as $line) {
                    if (strpos(strtolower($line), '<table class="SEASON" border="1" cellspacing="1">') > 0) {
                        $season = true;
                    } elseif (strpos(strtolower($line), '<table cellspacing="0" cellpadding="1">') > 0) {
                        $result = true;
                        $cnt = 0;
                    } elseif ($result && strpos(strtolower($line), '</table>') > 0) {
                        $result = false;
                    }
                }
            }
        }

        $this->printEindTijd();
    }

    public function beforeSave() {
        $laps = trim($this->laps);
        if (empty($laps) || ord($laps) == 194) {
            $this->laps = null;
        } else {
            $this->laps = ord($laps);
        }

        if ($this->deleted == 1) {
            $this->error = 0;
        }

        return parent::beforeSave();
    }

    public function reorderResults($store = false) {
        //
        echo '***** Start ReorderResults *****' . "\n";
        $this->printStarttijd();

        $found = true;
        $cnt = 0;
        $limit = 500;
        $criteria = new CDbCriteria;
        $criteria->select = 'id';
        $criteria->condition = 'deleted=0';
        $criteria->order = 'content_id,roundnum,sub,row';
        $criteria->limit = $limit;
        $display = 0;
        $round = '';
        $tclassification = '';
        $count = Tresult::model()->count();
        echo 'records:' . $count . "\n";
        while ($found) {
            $criteria->offset = $cnt * $limit;
            $list = Tresult::model()->findAll($criteria);
            $cnt++;
            //echo 'found:'.count($list).'('.$cnt.')'."\n";

            if (count($list) == 0) {
                $found = false;
            } else {
                foreach ($list as $id) {
                    $tresult = Tresult::model()->findByPk($id->id);
                    $display++;
                    if (($display % 1000) == 0) {
                        echo 'id:' . $id->id . ', done: ' . $display . ' = ' . (sprintf('%01.2f', ($display * 100) / $count)) . "%\n";
                    }

                    // check for a new round to reset the row
                    if (empty($round->name) || empty($round->num) || !($round->name == $tresult->round && $round->num == $tresult->roundnum && $round->sub == $tresult->sub)
                    ) {
                        $round->num = $tresult->roundnum;
                        $round->name = $tresult->round;
                        $round->sub = $tresult->sub;
                        $tclassification = '';
                    }
                    //
                    if (strtolower(trim($tresult->num)) == 'in entry list:' || strtolower(trim($tresult->num)) == 'in entry list only:'
                    ) {
                        $tclassification = 'DNA';
                    } elseif (strtolower($tresult->num) == 'did not start:') {
                        $tclassification = 'DNS';
                    } elseif (strtolower($tresult->num) == 'did not finish:') {
                        $tclassification = 'DNF';
                    } elseif (strtolower($tresult->num) == 'disqualified:') {
                        $tclassification = 'DSQ';
                    } elseif (strtolower($tresult->num) == 'did not practice:') {
                        $tclassification = 'DNP';
                        $tresult->deleted = 1;
                    } elseif (strtolower($tresult->num) == 'other starters:') {
                        $tclassification = 'NE';
                    } elseif (strtolower($tresult->num) == 'not classified:') {
                        $tclassification = 'NC';
                    } elseif (strtolower($tresult->num) == 'did not qualify:') {
                        $tclassification = 'DNQ';
                    }
                    //
                    if (!empty($tclassification)) {
                        $classification = $tclassification;
                    } else {
                        $classification = $tresult->classification;
                    }

                    // set the new row
                    if ($store) {
                        try {
                            //echo 'round'.$round->name.'/'.$round->num.'/'.$id.'->row:'.$row.',clas:'.$classification."\n";
                            $tresult->classification = $classification;
                            $tresult->save();
                        } catch (Exception $ex) {
                            echo 'tresult:' . $tresult->id . '=>' . substr($ex->getMessage(), 0, 80) . "\n";
                        }
                    }
                    unset($tresult);
                }
            }
            //break;
        }

        $this->printEindTijd();
        echo '***** Einde ReorderResults *****' . "\n";
    }

    /**
     * @name convert
     * @abstract converts all not converted Tresults into Result
     */
    public function convertResults($store = false, $tvehicle = "", $error = 0) {

        echo '***** Start ConvertResults *****' . "\n";
        $this->printStarttijd();
        $update = new CDbCriteria;
        $criteria = new CDbCriteria;
        if (empty($tvehicle) && empty($error)) {
            echo 'Update all!' . "\n";
            $update->condition = 'error <> 0 and deleted=0';
            $condition = 'deleted=0 and error=0';
        } else if (!empty($tvehicle)) {
            $update->condition = 'error <> 0 and deleted=0 and tvehicle like \'' . $tvehicle . '%\'';
            $condition = 'deleted=0 and error=0 and tvehicle like \'' . $tvehicle . '%\'';
        } else {
            $update->condition = 'error =' . $error . ' and deleted=0';
            $condition = 'deleted=0 and error=0';
        }
        Tresult::model()->updateAll(array('error' => '0'), $update);

        $found = true;
        $cnt = 0;
        $display = 0;

        $criteria->select = 'id';
        $criteria->condition = $condition;
        $count = Tresult::model()->count($criteria);
        if (empty($tvehicle)) {
            echo 'Todo : ' . $count . "\n";
        } else {
            echo 'Vehicle: ' . $tvehicle . ', todo : ' . $count . "\n";
        }

        $str = strlen((string) $count);
        $limit = str_pad('1', $str, 0);
        $criteria->limit = $limit;
        while ($found) {
            $list = Tresult::model()->findAll($criteria);
            $cnt++;
            //echo 'found:'.count($list).'('.$cnt.')'."\n";
            // no left:
            if (count($list) == 0) {
                $found = false;
            } else {
                foreach ($list as $id) {
                    $tresult = Tresult::model()->findByPk($id->id);
                    $display++;
                    if (($display % $limit) == 0) {
                        echo 'Pk :' . $id->id . ', tijd ' . date('Y-m-d H:i:s') . ', done: ' . $display . ' = ' . (sprintf('%01.2f', ($display * 100) / $count)) . "%\n";
                    }
                    try {
                        // Check op id
                        $tresult->subround_id = $this->findSubround($tresult);
                        $tresult->team_id = $this->findTeam($tresult);
                        if (empty($tresult->subround_id)) {
                            $tresult->error = 7;
                            $tresult->save();
                        } else if (empty($tresult->team_id)) {
                            $tresult->error = 8;
                            $tresult->save();

                            //} else if (empty($tresult->tvehicle)) {
                            //    $tresult->error = 6;
                            //    $tresult->save();
                        } else {
                            $vehicle = $this->findVehicle($tresult);
                            $tresult->make_id = $vehicle->make_id;
                            $tresult->type_id = $vehicle->type_id;
                            $tresult->vehicle_id = $vehicle->vehicle_id;
                            $tresult->save();
                            if ($store || empty($tresult->error)) {
                                if ($this->addIndividuals($tresult, false)) {
                                    if ($this->export($tresult->id)) {
                                        $tresult->deleted = 1;
                                        $tresult->save();
                                    }
                                }
                            }
                        }
                    } catch (Exception $ex) {
                        echo $ex->getMessage() . "\n";
                        print_r($tresult->getErrors() . "\n");
                        print_r($tresult . "\n");
                    }
                    unset($tresult);
                }
            }
            unset($list);
        }

        $criteria = new CDbCriteria;
        $criteria->select = 'id';
        $criteria->condition = $update->condition;
        $count = Tresult::model()->count($criteria);
        echo 'Left : ' . $count . "\n";

        $this->printEindTijd();
        echo '***** Einde ConvertResults *****' . "\n";
    }

    private function findSubround($tresult) {
        // once found it seems to be ok....
        if (!empty($tresult->subround_id)) {
            return $tresult->subround_id;
        }
        $result = '';
        $title = $tresult->content->title;
        $pos = strrpos($title, '.');
        $title = substr($tresult->content->title, 0, $pos);
        $season = substr($title, -4);
        $competition = str_replace($season, '', $title);

        if (empty($season) || empty($competition) || empty($tresult->sub) || empty($tresult->roundnum)) {
            echo 'Invalid round! pk:' . $tresult->id . ', title:' . $title . "\n";
        } else {
            $project = Project::model()->with(array('season', 'competition'))->find(
                    'season.name=:season and competition.code=:code', array('season' => $season,
                'code' => $competition)
            );
            if (!empty($project->id)) {
                $round = Round::model()->find('name=:name and project_id=:projectid and ordering=:roundnum', array(
                    'name' => trim($tresult->round),
                    'projectid' => $project->id,
                    'roundnum' => $tresult->roundnum
                        )
                );
                if (empty($round->id)) {
                    $round = Round::model()->with('event')->find('event.name=:name and project_id=:projectid and t.ordering=:roundnum', array(
                        'name' => trim($tresult->round),
                        'projectid' => $project->id,
                        'roundnum' => $tresult->roundnum
                            )
                    );
                }

                if (!empty($round->id)) {
                    // determine the subroundtype:
                    $subroundtype = $this->getSubroundType($tresult);
                    $raceclass = $this->getRaceclass($tresult);
                    //echo 'subroundtype:'.$subroundtype."\n";
                    // find the subround
                    $subround = Subround::model()->find('round_id=:round and subroundtype_id=:subroundtype and ordering=:ordering', array(
                        'round' => $round->id,
                        'ordering' => $tresult->sub,
                        'subroundtype' => $subroundtype
                            )
                    );
                    if (!empty($subround->id)) {
                        $result = $subround->id;
                    } else {
                        $subround = Subround::model()->find('round_id=:round and subroundtype_id=:subroundtype and raceclass_id=:raceclass and ordering=:ordering', array(
                            'round' => $round->id,
                            'ordering' => $tresult->sub,
                            'subroundtype' => $subroundtype,
                            'raceclass' => $raceclass->id,
                                )
                        );
                        if (empty($subround->id)) {
                            echo "No subround found for " . $tresult->id . "\n";
                            echo 'Round : ' . $tresult->round . ', id:' . $round->id . "\n";
                            echo ', project_id: ' . $project->id . "\n";
                            echo ', ordering: ' . $tresult->sub . "\n";
                            echo ', subroundtype:' . $subroundtype . "\n";
                            echo ', raceclass:' . $raceclass->id . "\n";
                            die;
                        }
                    }
                } else {
                    echo "Round not found!";
                    die;
                }
            } else {
                echo "Project not found!";
                die;
            }

            //echo 'project:'.$project->id."\n";
            //echo 'round:'.$round->id."\n";
            //echo 'subround:'.$subround->id."\n";

            unset($project);
            unset($round);
            unset($subround);
        }

        return $result;
    }

    private function findTeam($tresult) {
        if (!empty($tresult->team_id)) {
            return $tresult->team_id;
        }
        $result = null;
        if (empty($tresult->tteam) || in_array(trim(strtolower($tresult->tteam)), array(
                    'did not finish:',
                    'did not start:',
                    'in entry list:',
                    'other starters:',
                    '-',
                    'in entry list only:',
                    'not classified:',
                    'disqualified:',
                    'did not qualify:',
                    'running in practice:',
                    'did not practice:'))
        ) {
            $result = 214; // private entry
        } else {
            $team = Team::model()->find('name=:name and deleted=0', array('name' => trim($tresult->tteam)));
            if (empty($team->id)) {
                $team = Team::model()->find('alias=:name and deleted=0', array('name' => $this->getSlug(trim($tresult->tteam))));
                if (!empty($team->id)) {
                    $result = $team->id;
                }
            } else {
                $result = $team->id;
            }
        }

        return $result;
    }

    private function findTvehicle($vehicle, $chassis) {
        $result = new StdClass();
        // not found anywhere? Then check the conversion table:
        $tvehicle = Tvehicle::model()->find('tvehicle=:tvehicle and tchassis=:chassis and done=1', array(
            'tvehicle' => $vehicle,
            'chassis' => $chassis
                )
        );

        //print_r($tvehicle);
        //die;

        if (!empty($tvehicle->make_id)) {
            $result->make_id = $tvehicle->make_id;
            $result->type_id = $tvehicle->type_id;
            $result->vehicle_id = $tvehicle->vehicle_id;
            return $result;
        }

        $tvehicle = Tvehicle::model()->find('tvehicle=:tvehicle and done=1', array(
            'tvehicle' => $vehicle));
        if (!empty($tvehicle->type_id)) {
            $vehicle = Vehicle::model()->find('type_id=:type and chassisnumber=:chassis', array(
                'type' => $tvehicle->type_id, 'chassis' => $chassis)
            );
            if (!empty($vehicle->id)) {
                $result->make_id = $tvehicle->make_id;
                $result->type_id = $tvehicle->type_id;
                $result->vehicle_id = $vehicle->id;
                return $result;
            }
        }


        return false;
    }

    /**
     * find the make,type and chassis for a given Tresult
     * @param Tresult $tresult
     * $return Object Result with make_id, type_id and vehicle_id
     */
    private function findVehicle($tresult) {
        $vehicle = new StdClass();
        $vehicle->make_id = null;
        $vehicle->type_id = null;
        $vehicle->vehicle_id = null;
        $vehicle->engine_id = null;

        if (empty($tresult->tvehicle) || $tresult->tvehicle == '?' || $tresult->tvehicle == '-') {
            $make = Make::model()->find('name=:name', array('name' => 'Unknown'));
            $vehicle->make_id = $make->id;
            return $vehicle;
        }

        if (!empty($tresult->make_id) && (!empty($tresult->tchassis) && !empty($tresult->vehicle_id))) {
            $vehicle->make_id = $tresult->make_id;
            $vehicle->type_id = $tresult->type_id;
            $vehicle->vehicle_id = $tresult->vehicle_id;
            return $vehicle;
        }

        if (!empty($tresult->tchassis)) {

            // remove the last part, might be the engine....
            $type = trim($tresult->tvehicle);
            if (substr($type, -5) == 'Turbo') {
                $type = trim(str_replace('Turbo', '', $type));
            }
            $rpos = strrpos($type, ' ');
            if ($rpos !== false) {
                $type = substr($type, 0, $rpos);

                $tchassis = str_replace(' ', '', $tresult->tchassis);

                // find by Alias - no changes
                $fvehicle = $this->findVehicleByAlias($tresult->tvehicle, $tresult->tchassis);
                if (!$vehicle)
                    $fvehicle = $this->findVehicleByAlias($tresult->tvehicle, $tchassis);
                if (!$vehicle)
                    $fvehicle = $this->findVehicleByAlias($type, $tresult->tchassis);
                if (!$vehicle)
                    $fvehicle = $this->findVehicleByAlias($type, $tchassis);

                if (!$vehicle)
                    $fvehicle = $this->findVehicleByName($tresult->tvehicle, $tresult->tchassis);
                if (!$vehicle)
                    $fvehicle = $this->findVehicleByName($tresult->tvehicle, $tchassis);
                if (!$vehicle)
                    $fvehicle = $this->findVehicleByName($type, $tresult->tchassis);
                if (!$vehicle)
                    $fvehicle = $this->findVehicleByName($type, $tchassis);

                if (!empty($fvehicle->id)) {
                    $vehicle->type_id = $fvehicle->type_id;
                    $vehicle->make_id = $fvehicle->type->make_id;
                    $vehicle->vehicle_id = $fvehicle->id;
                    return $vehicle;
                }

                // not found within regular tables, not try to find the conversion tables:
                $tvehicle = $this->findTvehicle($tresult->tvehicle, $tresult->tchassis);
                if (!empty($tvehicle->vehicle_id)) {
                    $vehicle->make_id = $tvehicle->make_id;
                    $vehicle->type_id = $tvehicle->type_id;
                    $vehicle->vehicle_id = $tvehicle->vehicle_id;

                    return $vehicle;
                }
            } else {
                // Ok! No space in the type, but there is an chassisnumber? look up in the Tvehicles:
                $tvehicle = $this->findTvehicle($tresult->tvehicle, $tresult->tchassis);
                //print_r($tvehicle);
                if (!empty($tvehicle->vehicle_id)) {
                    $vehicle->make_id = $tvehicle->make_id;
                    $vehicle->type_id = $tvehicle->type_id;
                    $vehicle->vehicle_id = $tvehicle->vehicle_id;
                    return $vehicle;
                }
            }
        } else {
            $search = $this->getSlug(trim($tresult->tvehicle));
            $type = Type::model()->find('alias=:alias', array('alias' => $search));
            if (empty($type->id)) {
                $search = trim($tresult->tvehicle);
                $rpos = strrpos($search, ' ');
                if (!$rpos === false) {
                    $search = substr($search, 0, $rpos);
                    $search = $this->getSlug($search);
                    $type = Type::model()->find('alias=:alias', array('alias' => $search));
                }
            }

            if (!empty($type->id)) {
                $vehicle->make_id = $type->make_id;
                $vehicle->type_id = $type->id;
                return $vehicle;
            }

            $make = Make::model()->find('alias=:alias', array('alias' => $search));
            if (!empty($make->id)) {
                $vehicle->make_id = $make->id;
                $vehicle->type_id = null;
                $vehicle->vehicle_id = null;
                return $vehicle;
            }

            $name = trim($tresult->tvehicle);
            $make = Make::model()->find('name=:name', array('name' => $name));
            if (!empty($make->id)) {
                $vehicle->make_id = $make->id;
                $vehicle->type_id = null;
                $vehicle->vehicle_id = null;
                return $vehicle;
            }

            // not found anywhere? Then check the conversion table:
            $tvehicle = Tvehicle::model()->find('tvehicle=:tvehicle and done=1', array(
                'tvehicle' => $tresult->tvehicle));
            if (!empty($tvehicle->make_id)) {
                $vehicle->make_id = $tvehicle->make_id;
                $vehicle->type_id = $tvehicle->type_id;
            }
        }

        return $vehicle;
    }

    private function findVehicleByAlias($type, $chassis) {
        $found = false;
        $loop = true;
        while ($loop) {
            $search = $this->getSlug(($type) . '-' . trim($chassis));
            $vehicle = Vehicle::model()->find('alias=:alias', array('alias' => $search));
            if (!empty($vehicle->id) && $vehicle->id >= 1) {
                $found = true;
                $loop = false;
            } elseif (empty($vehicle->id) && substr($chassis, 0, 1) == '0' && strlen($chassis) >= 2) {
                $chassis = substr($chassis, 1);
            } else {
                $loop = false;
            }
        }
        if ($found) {
            return $vehicle;
        } else {
            return false;
        }
    }

    private function findVehicleByName($searchType, $chassis) {
        $found = false;
        $loop = true;
        $type = Type::model()->with('make')->find('concat(make.name," ",t.name)=:name', array(
            'name' => $searchType));
        if (!empty($type->id)) {
            while ($loop) {
                $vehicle = Vehicle::model()->find('type_id=:type and chassisnumber=:chassis', array(
                    'type' => $type->id, 'chassis' => $chassis)
                );
                if ($vehicle->id >= 1) {
                    $found = true;
                    $loop = false;
                } elseif (empty($vehicle->id) && substr($chassis, 0, 1) == '0' && strlen($chassis) >= 2) {
                    $chassis = substr($chassis, 1);
                } else {
                    $loop = false;
                }
            }
            if ($found) {
                return $vehicle;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function getRaceClass($tresult) {
        return Raceclass::model()->find('name=:name', array('name' => trim($tresult->raceclass)));
    }

    private function getSlug($title) {
        $title = str_replace('/', '-', $title);
        $title = str_replace('�', 'o', $title);
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

        $title = $this->remove_accents($title);
        if ($this->seems_utf8($title)) {
            if (function_exists('mb_strtolower')) {
                $title = mb_strtolower($title, 'UTF-8');
            }
            $title = $this->utf8_uri_encode($title, 200);
        }

        $title = strtolower($title);
        $title = preg_replace('/&.+?;/', '', $title); // kill entities
        $title = str_replace('.', '-', $title);
        $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $title = preg_replace('|-+|', '-', $title);
        $title = trim($title, '-');

        return $title;
    }

    private function getSubroundType($tresult) {
        $subroundtype = 4; // default race

        if (($tresult->round == '1000 km Okayama' && $tresult->rounddate == '1-11-2009' && empty($tresult->roundtype)) || ($tresult->round == 'UAE GT Yas Marina' && $tresult->rounddate == '27-1-2012' && empty($tresult->roundtype))
        ) {
            $subroundtype = 13; // Overall result
        } elseif ($tresult->round == 'BRDC GT Knockhill' && $tresult->rounddate == '11-5-2003') {
            if (empty($tresult->roundtype)) {
                $subroundtype = 18; // non offical overall result
            } else {
                $subroundtype = 4;
            }
        } else {
            if (substr(strtolower($tresult->roundtype), 0, 10) == 'qualifying') {
                $subroundtype = 12; // qualification
            } elseif (substr(strtolower($tresult->roundtype), 0, 4) == 'heat') {
                $subroundtype = 5; // manche
            }
        }

        return $subroundtype;
    }

    /**
     * Converts all accent characters to ASCII characters.
     *
     * If there are no accent characters, then the string given is just returned.
     *
     * @param string $string Text that might have accent characters
     * @return string Filtered string with replaced "nice" characters.
     */
    private function _remove_accents($string) {
        if (!preg_match('/[\x80-\xff]/', $string))
            return $string;

        if ($this->seems_utf8($string)) {
            $chars = array(
                // Decompositions for Latin-1 Supplement
                chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
                chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
                chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
                chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
                chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
                chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
                chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
                chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
                chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
                chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
                chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
                chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
                chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
                chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
                chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
                chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
                chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
                chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
                chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
                chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
                chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
                chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
                chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
                chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
                chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
                chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
                chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
                chr(195) . chr(191) => 'y',
                // Decompositions for Latin Extended-A
                chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
                chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
                chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
                chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
                chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
                chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
                chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
                chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
                chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
                chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
                chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
                chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
                chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
                chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
                chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
                chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
                chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
                chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
                chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
                chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
                chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
                chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
                chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
                chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
                chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
                chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
                chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
                chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
                chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
                chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
                chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
                chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
                chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
                chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
                chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
                chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
                chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
                chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
                chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
                chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
                chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
                chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
                chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
                chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
                chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
                chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
                chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
                chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
                chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
                chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
                chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
                chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
                chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
                chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
                chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
                chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
                chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
                chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
                chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
                chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
                chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
                chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
                chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
                chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's',
                // Euro Sign
                chr(226) . chr(130) . chr(172) => 'E',
                // GBP (Pound) Sign
                chr(194) . chr(163) => '');

            $string = strtr($string, $chars);
        } else {
            // Assume ISO-8859-1 if not UTF-8
            $chars['in'] = chr(128) . chr(131) . chr(138) . chr(142) . chr(154) . chr(158)
                    . chr(159) . chr(162) . chr(165) . chr(181) . chr(192) . chr(193) . chr(194)
                    . chr(195) . chr(196) . chr(197) . chr(199) . chr(200) . chr(201) . chr(202)
                    . chr(203) . chr(204) . chr(205) . chr(206) . chr(207) . chr(209) . chr(210)
                    . chr(211) . chr(212) . chr(213) . chr(214) . chr(216) . chr(217) . chr(218)
                    . chr(219) . chr(220) . chr(221) . chr(224) . chr(225) . chr(226) . chr(227)
                    . chr(228) . chr(229) . chr(231) . chr(232) . chr(233) . chr(234) . chr(235)
                    . chr(236) . chr(237) . chr(238) . chr(239) . chr(241) . chr(242) . chr(243)
                    . chr(244) . chr(245) . chr(246) . chr(248) . chr(249) . chr(250) . chr(251)
                    . chr(252) . chr(253) . chr(255) . chr(186);

            $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyyo";

            $string = strtr($string, $chars['in'], $chars['out']);
            $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208),
                chr(222), chr(223), chr(230), chr(240), chr(254));
            $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae',
                'dh', 'th');
            $string = str_replace($double_chars['in'], $double_chars['out'], $string);
        }

        return $string;
    }

    private function checkResult() {
        if (in_array(trim(strtolower($this->num)), self::$noValidResults) && empty($this->tvehicle)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @name readContent
     * @abstract reads the contenttable and converts them into tResult
     */
    public function readContent($key, $sectionId, $catId) {

        $this->list = Content::model()->findAll(
                'catid = :cat and sectionid = :section', array('section' => $sectionId,
            'cat' => $catId)
        );

        echo 'Key : ' . $key . "\n";
        echo 'Category : ' . $catId . "\n";
        echo 'Section : ' . $sectionId . "\n";
        echo 'Articles:' . count($this->list) . "\n";

        if ($key == 'wsrp') {
            $this->convertContentWsrp();
        } elseif ($key == 'formula2') {
            $this->convertContentFormula2();
        }
    }

    /**
     * function to convert the content of Formula 2.net into tresults.
     */
    private function convertContentFormula2() {
        foreach ($this->list as $article) {
            echo 'article:' . $article->title . "\n";

            if (lower(substr($article->title, 0, 2)) == 'f2') {
                
            } elseif (lower(substr($article->title, 0, 2)) == 'f3') {
                
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

    /**
     * method to convert the content of Wsrp into tResults:
     */
    private function convertContentWsrp() {
        foreach ($this->list as $article) {
            echo 'article:' . $article->title . "\n";

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
                            $rounds = $this->table2array($seasonTable, false);
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
                            $results = $this->table2array($resultTable, false);

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

    private function addProject($name, $title) {
        return true;

        $this->project = Project::model()->find('name=:name', array('name' => $name));
        if (empty($this->project->id)) {
            $code = substr($title, 0, strlen($title) - 9);
            $year = substr(str_replace('.html', '', $title), -4, 4);
            $this->project = Project::model()->with(array('competition', 'season'))->find('season.name=:season and competition.code=:code', array(
                'season' => $year, 'code' => $code));
            if (empty($this->project->id)) {
                echo 'project not found:' . $name . '/' . $title . '(' . $code . '/' . $year . ')' . "\n";
            }
        }
    }

    /**
     *
     * */
    private function addResults($content, $rounds, $currentRound, $results, $roundType) {
        // check if all is right to add the results to a certain round:
        if ($currentRound == 0 || $currentRound > count($rounds) || count($results) == 0) {
            echo 'project:' . $content->title . "\n";
            echo 'rounds:' . count($rounds) . "\n";
            echo 'currentRound:' . $currentRound . "\n";
            echo 'results:' . count($results) . "\n";

            return false;
        }

        $this->subround++;
        $round = $rounds[$currentRound];
        $round['Date'] = str_replace('.', '-', $round['Date']);

        $row = 0;
        foreach ($results as $result) {
            $this->results++;
            $row++;
            $tresult = Tresult::model()->find('round=:round and rounddate=:rounddate and roundnum=:roundnum and sub=:sub and row=:row and content_id=:content', array(
                'round' => $round['Race'],
                'rounddate' => $round['Date'],
                'roundnum' => $currentRound,
                'sub' => $this->subround,
                'row' => $row,
                'content' => $content->id
                    )
            );
            $tchassis = $this->convertVehicle($result['Car']);
            $updated = false;
            if (empty($tresult->id)) {
                $tresult = new Tresult();
                $tresult->content_id = $content->id;
                $tresult->roundnum = $currentRound;
                $tresult->round = trim($round['Race']);
                $tresult->rounddate = trim($round['Date']);
                $tresult->row = $row;
                $tresult->sub = $this->subround;
                $this->added++;
                $updated = true;
            } else {
                $this->found++;
                if ($tresult->pos != $result['Pos.'] || $tresult->num != $result['No.'] || $tresult->individuals != $this->convertIndividuals($result['Driver / Nationality']) || (is_array($tchassis) && ( $tresult->tvehicle != $tchassis['vehicle'] || $tresult->tchassis != $tchassis['chassis'] || $tresult->tlicenseplate != $tchassis['licenseplate']
                        )) || (!is_array($tchassis) && $tresult->tvehicle != $tchassis) || $tresult->tteam != $result['Entrant'] || $tresult->laps != $result['Laps'] || $tresult->performance != $result['Time/retired'] || $tresult->classification != $result['Pos. (2)'] || $tresult->raceclass != $result['Group'] || $tresult->grid != $result['Pos. (3)'] || $tresult->laptime != $result['Practice']
                ) {
                    $updated = true;
                    $this->updated++;
                }
            }
            $tresult->roundtype = trim($roundType);
            $tresult->pos = $result['Pos.'];
            $tresult->num = $result['No.'];
            $tresult->individuals = $this->convertIndividuals($result['Driver / Nationality']);
            if (is_array($tchassis)) {
                $tresult->tvehicle = $tchassis['vehicle'];
                $tresult->tchassis = $tchassis['chassis'];
                $tresult->tlicenseplate = $tchassis['licenseplate'];
            } else {
                $tresult->tvehicle = $tchassis;
            }
            $tresult->tteam = $result['Entrant'];
            $tresult->laps = $result['Laps'];
            $tresult->performance = $result['Time/retired'];
            $tresult->classification = $result['Pos. (2)'];
            $tresult->raceclass = $result['Group'];
            $tresult->grid = $result['Pos. (3)'];
            $tresult->laptime = $result['Practice'];
            if ($updated) {
                $tresult->deleted = 0;
                $tresult->error = 0;
            }
            //$tresult->Livery = $result[''];
            //$tresult->Field4Question = $result[''];
            //$tresult->Field4Or = $result[''];
            //$tresult->Field4Evo = $result[''];
            //$tresult->Field4_2 = $result[''];
            $tresult->save();
        }

        return true;
    }

    /**
     *
     * Enter description here ...
     * @param $project
     * @param $rounds
     */
    private function addRounds($rounds) {
        return true;

        if (!empty($this->project->id)) {
            foreach ($rounds as $round) {
                
            }
        }
    }

    private function convertIndividuals($individuals) {
        $result = str_replace('<br />', ';', $individuals);

        return strip_tags($result);
    }

    private function convertVehicle($vehicle) {

        $chassis = strpos($vehicle, '<font color="green">');
        $licenseplate = strpos($vehicle, '<font color="gray">');

        if ($chassis !== false && $licenseplate !== false) {
            $end = strpos($vehicle, '</font>');
            $result['vehicle'] = substr($vehicle, 0, $chassis);
            $result['chassis'] = strip_tags(substr($vehicle, $chassis, $end - $chassis));
            $result['licenseplate'] = strip_tags(substr($vehicle, $licenseplate));
        } else if ($chassis !== false) {
            $result['vehicle'] = substr($vehicle, 0, $chassis);
            $result['chassis'] = strip_tags(substr($vehicle, $chassis));
        } else if ($licenseplate !== false) {
            $result['vehicle'] = substr($vehicle, 0, $licenseplate);
            $result['licenseplate'] = strip_tags(substr($vehicle, $licenseplate));
        } else {
            $result = strip_tags($vehicle);
        }

        return $result;
    }

    /**
     * Enter description here ...
     * @param $table
     * @param $debug
     */
    private function table2array($table, $headerRow = true, $debug = false) {

        if ($debug) {
            debug($table);
        }

        $tbl = new TableExtractor();
        $tbl->source = $table; // Set the HTML Document
        $tbl->htmlEntitiesDecode = true;
        $tbl->headerRow = $headerRow;
        $data = $tbl->extractTable(); // The array

        return $data;
    }

    private function convertCountryName($input) {
        if ($input == 'Russia') {
            return 'Russian Federation';
        } elseif ($input == 'Germany') {
            return 'Germany, Federal Republic of';
        } elseif ($input == 'Great Britain') {
            return 'United Kingdom';
        } elseif ($input == 'Chili') {
            return 'Chile';
        } elseif ($input == 'United States') {
            return 'United States of America';
        } elseif ($input == 'East Germany') {
            return 'German Democratic Republic';
        } elseif ($input == 'West Germany') {
            return 'Germany, Federal Republic of';
        }

        return $input;
    }

    private function convertCountryCode($input) {
        if ($input == "BAH") {
            return "BHR";
        } elseif ($input == "BUL") {
            return "BGR";
        } elseif ($input == "CRO") {
            return "HRV";
        } elseif ($input == "GER") {
            return "DEU";
        } elseif ($input == "GRE") {
            return "GRC";
        } elseif ($input == "INA") {
            return "IND";
        } elseif ($input == "LAT") {
            return "LVA";
        } elseif ($input == "LIB") {
            return "LBN";
        } elseif ($input == "MAS") {
            return "MYS";
        } elseif ($input == "MON") {
            return "MCO";
        } elseif ($input == "NED") {
            return "NLD";
        } elseif ($input == "OMA") {
            return "OMN";
        } elseif ($input == "POR") {
            return "PRT";
        } elseif ($input == "ROM") {
            return "ROU";
        } elseif ($input == "RSA") {
            return "ZAF";
        } elseif ($input == "SLO") {
            return "SVK";
        } elseif ($input == "SUI") {
            return "CHE";
        } elseif ($input == "UAE") {
            return "ARE";
        }

        return $input;
    }

}
