<?php

/**
 * This is the model class for table "{{tracks_individuals}}".
 *
 * The followings are the available columns in table '{{tracks_individuals}}':
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property string $full_name
 * @property string $alias
 * @property string $nickname
 * @property string $height
 * @property string $weight
 * @property string $gender
 * @property string $date_of_birth
 * @property string $place_of_birth
 * @property string $country_of_birth
 * @property string $nationality
 * @property string $date_of_death
 * @property string $place_of_death
 * @property string $country_of_death
 * @property integer $user_id
 * @property string $picture
 * @property string $picture_small
 * @property string $address
 * @property string $postcode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $description
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Individual extends BaseModel {

    public static $displayField = 'full_name';

    public static function getDisplayField($class = __CLASS__) {
        return parent::getDisplayField($class);
    }

    public function getListBornToday() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date_format( date_of_birth, "%d%m" ) = date_format( curdate( ) , "%d%m") and date_of_death is null';
        $criteria->order = 'date_of_birth asc';

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getListDiedToday() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date_format( date_of_death, "%d%m" ) = date_format( curdate( ) , "%d%m")';
        $criteria->order = 'date_of_birth asc';

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getMissingBirthDate() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date_of_birth is null and date_of_death is not null';
        $criteria->order = 'date_of_death asc';

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getEarlyBirds() {
        $criteria = new CDbCriteria;
        $criteria->distinct = true;
        $criteria->condition = 'date_of_birth is not null and datediff(s.start_date, date_of_birth) < 0';
        $criteria->order = 'date_of_birth asc';
        $criteria->join = "inner join k4ezl_tracks_results r on t.id = r.individual_id inner join k4ezl_tracks_subrounds s on s.id = r.subround_id and s.start_date is not null";

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getDieHards() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date_of_birth is not null and date_of_death is null and datediff(curdate(),date_of_birth) >= 90';
        $criteria->order = 'date_of_birth asc';

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getTwinsOrDoubles() {
        $criteria = new CDbCriteria;
        $criteria->select = 'first_name, last_name, nickname, concat(first_name," ",last_name) as full_name, nationality, count(id) AS cnt,min(id) as min_id,max(id)as max_id';
        $criteria->group = 'first_name, last_name, nickname, nationality, ordering';
        $criteria->having = 'count(id) >= 2';
        $criteria->order = 'last_name asc';
        $criteria->condition = '((first_name is not null and last_name is not null) or nickname is not null) and deleted=0';

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'Pagination' => array('pageSize' => 20,),
        ));
    }

    public static function getClassName() {
        return 'Individual';
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Individual the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_individuals}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('last_name, first_name', 'required'),
            array('user_id, published, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('last_name, place_of_birth, place_of_death, city', 'length', 'max' => 50),
            array('first_name', 'length', 'max' => 30),
            array('full_name, alias, nickname', 'length', 'max' => 100),
            array('height, weight, postcode', 'length', 'max' => 10),
            array('gender', 'length', 'max' => 1),
            array('country_of_birth, nationality, country_of_death, country', 'length', 'max' => 3),
            array('picture, picture_small', 'length', 'max' => 250),
            array('state', 'length', 'max' => 20),
            array('date_of_birth, date_of_death, address, description, modified, deleted_date', 'safe'),
            // one of three:
            array('last_name, nickname', 'oneOfThese', 'last_name', 'nickname'),
            // referential checks:
            array('user_id', 'exist', 'attributeName' => 'id', 'className' => 'User'),
            array('nationality, country_of_birth, country_of_death', 'exist', 'attributeName' => 'iso3', 'className' => 'Country'),
            // unique key constraint:
            array('nickname', 'unique'),
            array('last_name+first_name+nationality+date_of_birth', 'uniqueMultiColumnValidator', 'caseSensitive' => 'true'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, last_name, first_name, full_name, alias, nickname, height, weight, gender, date_of_birth, place_of_birth, country_of_birth, nationality, date_of_death, place_of_death, country_of_death, user_id, picture, picture_small, address, postcode, city, state, country, description, published, checked_out, checked_out_time, created, modified, deleted, deleted_date',
                'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'rankings' => array(self::HAS_MANY, 'Ranking', 'individual_id'),
            'results' => array(self::HAS_MANY, 'Result', 'individual_id'),
            'tresults' => array(self::HAS_MANY, 'TresultIndividual', 'individual_id'),
            'makes' => array(self::HAS_MANY, 'Make', 'founder_id'),
            'checked_out' => array(self::BELONGS_TO, 'User', 'user_id'),
            'participant' => array(self::HAS_MANY, 'Participant', 'individual_id'),
            'scalemodel' => array(self::HAS_MANY, 'ScalemodelDriver', 'individual_id'),
            'references' => array(self::HAS_MANY, 'IndividualReference', 'individual_id'),
        );
    }

    public function getAge() {
        if (empty($this->date_of_death) || $this->date_of_death == '0000-00-00') {
            $now = new DateTime();
        } else {
            $now = new DateTime($this->date_of_death);
        }
        $birth = new DateTime($this->date_of_birth);

        return $birth->diff($now)->format('%r%y');
    }

    /**
     * Before saving to database
     */
    public function beforeSave() {
        // Set the fullname of the individual when empty:
        if (empty($this->full_name)) {
            if (empty($this->last_name)) {
                $this->full_name = '"' . $this->nickname . '"';
            } else {
                if (empty($this->first_name)) {
                    $this->full_name = $this->last_name;
                } else {
                    $this->full_name = $this->first_name . ' ' . $this->last_name;
                }
            }
        }



        // corect some  of the fields with invalid data:
        // date of birth:
        if ($this->date_of_birth == '0000-00-00' || empty($this->date_of_birth)) {
            $this->date_of_birth = null;
        }

        if ($this->date_of_death == '0000-00-00' || empty($this->date_of_death)) {
            $this->date_of_death = null;
        }

        if ($this->user == 0) {
            $this->user = null;
        }

        if (empty($this->nickname)) {
            $this->nickname = null;
        }

        if (empty($this->nationality)) {
            $this->nationality = null;
        }

        return parent::beforeSave();
    }

    protected function beforeValidate() {

        // check the nationality when its length is not 3 long:
        if (!empty($this->nationality) && strlen(trim($this->nationality)) != 3) {
            $this->nationality = Countries::convertToIso3($this->nationality);
        }

        return parent::beforeValidate();
    }

    /**
     * replaces where possible the id of indivuald $id with the current Individual.
     * @param int $id
     * @return boolean
     */
    public function combine($id) {
        $return = false;
        if (!empty($id)) {
            $transaction = Yii::app()->db->beginTransaction();

            try {
                if ($this->combineRankings($id) &&
                        $this->combineResults($id) &&
                        $this->combineParticipants($id) &&
                        $this->combineTresults($id) &&
                        $this->combineMakes($id) &&
                        $this->combineOwners($id)) {
                    //$this->combineUsers($id);
                    //$this->combineScaleModels($id);
                    // now update the current one:
                    $this->full_name = null;
                    $this->alias = null;
                    if ($this->save()) {
                        // ok: now delete it:                  
                        $doubleIndividual = Individual::model()->findByPk($id);
                        $doubleIndividual->deleted = 1;
                        if ($doubleIndividual->save()) {
                            $return = true;
                            $transaction->commit();
                        } else {
                            print_r($doubleIndividual->getErrors());
                            $transaction->rollback();
                        }
                    } else {
                        print_r($this->getErrors());
                        $transaction->rollback();
                    }
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
                $return = false;
                $transaction->rollback();
            }
        }
        return $return;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'full_name' => 'Full Name',
            'alias' => 'Alias',
            'nickname' => 'Nickname',
            'height' => 'Height',
            'weight' => 'Weight',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'place_of_birth' => 'Place Of Birth',
            'country_of_birth' => 'Country Of Birth',
            'nationality' => 'Nationality',
            'date_of_death' => 'Date Of Death',
            'place_of_death' => 'Place Of Death',
            'country_of_death' => 'Country Of Death',
            'user_id' => 'User',
            'picture' => 'Picture',
            'picture_small' => 'Picture Small',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'description' => 'Description',
            'published' => 'Published',
            'ordering' => 'Order',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'deleted',
            'deleted_date' => 'Deleted Date',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('full_name', $this->full_name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('nickname', $this->nickname, true);
        $criteria->compare('height', $this->height, true);
        $criteria->compare('weight', $this->weight, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('date_of_birth', $this->date_of_birth, true);
        $criteria->compare('place_of_birth', $this->place_of_birth, true);
        $criteria->compare('country_of_birth', $this->country_of_birth, true);
        $criteria->compare('nationality', $this->nationality, true);
        $criteria->compare('date_of_death', $this->date_of_death, true);
        $criteria->compare('place_of_death', $this->place_of_death, true);
        $criteria->compare('country_of_death', $this->country_of_death, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('picture_small', $this->picture_small, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('postcode', $this->postcode, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', 0);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'Pagination' => array('pageSize' => 20,),
        ));
    }

    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                . '/individuals'
                . '/' . substr($this->getSlug($this->last_name), 0, 1)
                . '/' . $this->getSlug($this->alias)
        ); // The directory to display
    }

    public function afterSave() {

        // create a directory for the album of the Individual
        //$album = $this->getAlbum();
        //if (!is_dir($album)) {
        //    mkdir($album, 0777, true);
        //}
        // do some nice stuff in the parent afterSave
        return parent::afterSave();
    }

    private function combineMakes($id) {

        $return = true;
        $list = Make::model()->findAll('founder_id=:founder', array('founder' => $id));
        echo 'count founder : ' . count($list) . "\n";
        if (count($list) > 0) {
            foreach ($list as $make) {
                try {
                    $make->founder_id = $this->id;
                    if ($make->validate()) {
                        if (!$make->save()) {
                            echo 'listid : ' . $listId . "\n";
                            echo 'thisid : ' . $this->id . "\n";
                            print_r($make->getErrors());
                            die;
                        }
                    } else {
                        print_r($make->getErrors());
                        return false;
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    $return = false;
                }
            }
        }
        return $return;
    }

    private function combineOwners($id) {

        $return = true;
        $list = Owner::model()->findAll('individual_id=:individual', array('individual' => $id));
        echo 'count owners : ' . count($list) . "\n";
        if (count($list) > 0) {
            foreach ($list as $owner) {
                try {
                    $owner->individual_id = $this->id;
                    if ($owner->validate()) {
                        if (!$owner->save()) {
                            echo 'listid : ' . $listId . "\n";
                            echo 'thisid : ' . $this->id . "\n";
                            print_r($owner->getErrors());
                            die;
                        }
                    } else {
                        print_r($owner->getErrors());
                        return false;
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    $return = false;
                }
            }
        }

        return $return;
    }

    private function combineParticipants($id) {

        $knownError = array('individual_id' => array('The Combination of (Individual+Project+Team) should be unique in the current context.'),
            'project_id' => array('The Combination of (Individual+Project+Team) should be unique in the current context.'),
            'team_id' => array('The Combination of (Individual+Project+Team) should be unique in the current context.'),
        );
        $return = true;
        $list = Participant::model()->findAll('individual_id=:individual', array('individual' => $id));
        echo 'count participants : ' . count($list) . ', id:' . $id . "\n";
        if (count($list) > 0) {
            foreach ($list as $participant) {
                try {
                    $participant->individual_id = $this->id;
                    if ($participant->validate()) {
                        if (!$participant->save()) {
                            echo 'listid : ' . $listId . "\n";
                            echo 'thisid : ' . $this->id . "\n";
                            print_r($participant->getErrors());
                        }
                    } else {
                        $countDiffAssoc = count(array_diff_assoc($participant->getErrors(), $knownError));
                        if ($countDiffAssoc >= 1) {
                            print_r($participant->getErrors());
                            return false;
                        } else {
                            if ($participant->delete()) {
                                echo 'Participant with id ' . $participant->id . ' deleted';
                            } else {
                                return false;
                            }
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    $return = false;
                }
            }
        }

        return $return;
    }

    private function combineRankings($id) {

        $return = true;
        $list = Ranking::model()->findAll('individual_id=:individual', array('individual' => $id));
        echo 'count rankings : ' . count($list) . "\n";
        if (count($list) > 0) {
            foreach ($list as $ranking) {
                try {
                    $ranking->individual_id = $this->id;
                    if ($ranking->validate()) {
                        if (!$ranking->save()) {
                            echo 'listid : ' . $listId . "\n";
                            echo 'thisid : ' . $this->id . "\n";
                            print_r($ranking->getErrors());
                            die;
                        }
                    } else {
                        print_r($ranking->getErrors());
                        return false;
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    $return = false;
                }
            }
        }

        return $return;
    }

    private function combineResults($id) {

        $knownError = array('individual_id' => array('The Combination of (Individual+Team+Subround+Rank) should be unique in the current context.'),
            'team_id' => array('The Combination of (Individual+Team+Subround+Rank) should be unique in the current context.'),
            'subround_id' => array('The Combination of (Individual+Team+Subround+Rank) should be unique in the current context.'),
            'rank' => array('The Combination of (Individual+Team+Subround+Rank) should be unique in the current context. ')
        );

        $return = true;
        $list = Result::model()->findAll('individual_id=:individual', array('individual' => $id));
        echo 'count results : ' . count($list) . "\n";
        if (count($list) > 0) {
            foreach ($list as $result) {
                try {
                    $result->individual_id = $this->id;
                    if ($result->validate()) {
                        if (!$result->save()) {
                            echo 'listid : ' . $listId . "\n";
                            echo 'thisid : ' . $this->id . "\n";
                            print_r($result->getErrors());
                            die;
                        }
                    } else {
                        $countDiffAssoc = count(array_diff_assoc($result->getErrors(), $knownError));
                        if ($countDiffAssoc >= 1) {
                            print_r($result->getErrors());
                            return false;
                        } else {
                            if ($result->delete()) {
                                echo 'Result with id ' . $result->id . ' deleted';
                            } else {
                                return false;
                            }
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    print_r($result->getErrors());
                    $return = false;
                    die;
                }
            }
        }
        return $return;
    }

    private function combineTresults($id) {

        $return = true;
        $list = TresultIndividual::model()->findAll('individual_id=:individual', array('individual' => $id));
        echo 'count tresults : ' . count($list) . "\n";
        if (count($list) > 0) {
            foreach ($list as $tresult) {
                try {
                    $tresult->individual_id = $this->id;
                    if ($tresult->validate()) {
                        if (!$tresult->save()) {
                            echo 'listid : ' . $listId . "\n";
                            echo 'thisid : ' . $this->id . "\n";
                            print_r($tresult->getErrors());
                            die;
                        }
                    } else {
                        print_r($tresult->getErrors());
                        return false;
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    $return = false;
                }
            }
        }
        return $return;
    }

    /**
     * Should be called three times
     *
     * $attribute will be one of phone1, phone2 or phone3
     * $params will always be array('phone1', 'phone2', 'phone3')
     *
     * (as far as I can remember...)
     */
    public function oneOfThese($attribute, $params) {
        $valid = false;

        foreach ($params as $param) {
            if (!empty($this->$param)) {
                $valid = true;
                break;
            }
        }

        if ($valid === false) {
            $this->addError($attribute, 'Lastname or nickname should be entered');
        }
    }

    public function batchUpdateAll() {

        echo '***** UpdateAll Individuals *****' . "\n";
        $this->printStarttijd();
        $update = new CDbCriteria();
        $criteria = new CDbCriteria();
        // in order to get all individuals, set published to 0, except the deleted:
        echo 'Update all!' . "\n";
        $update->condition = 'published=0 and deleted=0';
        $condition = 'deleted=0 and published=0';

        Individual::model()->updateAll(array('published' => '0'), $update);

        $found = true;
        $cnt = 0;
        $display = 0;

        $criteria->select = 'id';
        $criteria->condition = $condition;
        $count = Individual::model()->count($criteria);
        echo 'Todo : ' . $count . "\n";

        $str = strlen((string) $count);
        if ($str >= 5) {
            $str = 5;
        }
        $readlimit = str_pad('1', $str, 0);
        $displaylimit = str_pad('1', $str, 0);
        $criteria->limit = $readlimit;
        $criteria->order = 'id';
        $looper = 0;
        while ($found) {
            $looper++;
            //echo '- Loop : ' . $looper . ', done: ' . $display . ', tijd ' . date('Y-m-d H:i:s') . "\n";
            $list = Individual::model()->findAll($criteria);
            $cnt++;
            //echo 'found:'.count($list).'('.$cnt.')'."\n";
            // no left:
            if (count($list) == 0) {
                $found = false;
            } else {
                foreach ($list as $id) {
                    $individual = Individual::model()->findByPk($id->id);
                    $display++;
                    if (($display % $displaylimit) == 0) {
                        echo '- Pk :' . $id->id . ', tijd ' . date('Y-m-d H:i:s') . ', done: ' . $display . ' = ' . (sprintf('%01.2f', ($display * 100) / $count)) . "%\n";
                    }
                    try {
                        $individual->full_name = null;
                        $individual->alias = null;
                        $individual->published = 1;
                        if (!$individual->save()) {
                            print_r($individual->getErrors());
                        }
                    } catch (Exception $ex) {
                        echo $ex->getMessage() . "\n";
                        print_r($individual->getErrors() . "\n");
                        print_r($individual . "\n");
                    }
                    unset($individual);
                }
            }
            unset($list);
        }

        $criteria = new CDbCriteria;
        $criteria->select = 'id';
        $criteria->condition = $update->condition;
        $count = Individual::model()->count($criteria);
        echo 'Left : ' . $count . "\n";

        $this->printEindTijd();
        echo '***** Einde ConvertResults *****' . "\n";
    }

}
