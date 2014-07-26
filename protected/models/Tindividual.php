<?php

/**
 * This is the model class for table "{{tracks_tindividuals}}".
 *
 * The followings are the available columns in table '{{tracks_tindividuals}}':
 * @property integer $id
 * @property integer $content_id
 * @property string $last_name
 * @property string $first_name
 * @property string $full_name
 * @property string $nickname
 * @property integer $individual_id
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
 * @property string $picture
 * @property string $address
 * @property string $postcode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $description
 * @property integer $error
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Tindividual extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_tindividuals}}';
    }

    public function getDisplayField() {
        return 'full_name';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('last_name, first_name, created', 'required'),
            array('individual_id, content_id, error, deleted', 'numerical', 'integerOnly' => true),
            array('last_name, place_of_birth, place_of_death, city', 'length', 'max' => 50),
            array('first_name', 'length', 'max' => 30),
            array('full_name, nickname', 'length', 'max' => 100),
            array('height, weight, postcode', 'length', 'max' => 10),
            array('gender', 'length', 'max' => 1),
            array('country_of_birth, nationality, country_of_death, country', 'length', 'max' => 3),
            array('picture', 'length', 'max' => 250),
            array('state', 'length', 'max' => 20),
            array('date_of_birth, date_of_death, address, description, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, content_id, last_name, first_name, full_name, nickname, height, weight, gender, date_of_birth, place_of_birth, country_of_birth, nationality, date_of_death, place_of_death, country_of_death, picture, address, postcode, city, state, country, description, error, created, modified, deleted, deleted_date',
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
            'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
            'individual' => array(self::BELONGS_TO, 'Individual', 'individual_id'),
        );
    }

    /**
     * Before saving to database
     */
    public function beforeSave() {

        if (empty($this->full_name)) {
            $this->full_name = $this->last_name . ', ' . $this->first_name;
        }

        if (!empty($this->nationality) && strlen(trim($this->nationality)) != 3) {
            $this->nationality = Countries::convertToIso3($this->nationality);
        }

        if ($this->date_of_birth == '0000-00-00' || empty($this->date_of_birth)) {
            $this->date_of_birth = null;
        }

        if ($this->date_of_death == '0000-00-00' || empty($this->date_of_death)) {
            $this->date_of_death = null;
        }

        if ($this->deleted == 1) {
            $this->error = 0;
        }

        return parent::beforeSave();
    }

    public function behaviors() {
        return array('AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'content_id' => 'Content',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'full_name' => 'Full Name',
            'nickname' => 'Nickname',
            'individual_id' => 'Individual',
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
            'picture' => 'Picture',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'description' => 'Description',
            'error' => 'Error',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('content_id', $this->content_id);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('full_name', $this->full_name, true);
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
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('postcode', $this->postcode, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('error', $this->error);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', 0);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @name readContent
     * @abstract reads the contenttable and converts them into tResult
     */
    public static function readContent($key, $sectionId, $catId) {

        $list = Content::model()->findAll(
                'catid = :cat and sectionid = :section', array('section' => $sectionId, 'cat' => $catId)
        );

        echo 'Key : ' . $key . "\n";
        echo 'Category : ' . $catId . "\n";
        echo 'Section : ' . $sectionId . "\n";
        echo 'Articles:' . count($list) . "\n";

        if ($key == 'gelpeople') {
            Tindividual::convertContentGelPeople($list);
        } elseif ($key == 'geldrivers') {
            Tindividual::convertContentGelDrivers($list);
        }
    }

    public function convertTindividual(){
        if (empty($this->individual_id)){
            $individual = $this->findIndividual($this, true);
            if ($individual != false) {
                $this->individual_id = $individual->id;
            }
        }
    }

    /**
     * @name convert
     * @abstract converts all not converted Tresults into Result
     */
    public function convertIndividuals($store = false) {

        echo '***** Start ConvertIndividuals *****' . "\n";
        $this->printStarttijd();
        $update = new CDbCriteria;

        echo 'Update all!' . "\n";
        $update->condition = 'error <> 0 and deleted=0';
        $condition = 'deleted=0 and error=0'; // and tvehicle is not null and make_id is null';
        Tindividual::model()->updateAll(array('error' => '0'), $update);

        $found = true;
        $cnt = 0;
        $display = 0;

        $criteria = new CDbCriteria;
        $criteria->select = 'id';
        $criteria->condition = $condition;
        $count = Tindividual::model()->count($criteria);

        echo 'Todo : ' . $count . "\n";

        $str = strlen((string) $count);
        $limit = str_pad('1', $str - 1, 0);
        $criteria->limit = $limit;
        while ($found) {
            $list = Tindividual::model()->findAll($criteria);
            $cnt++;
            //echo 'found:'.count($list).'('.$cnt.')'."\n";
            // no left:
            if (count($list) == 0) {
                $found = false;
            } else {
                foreach ($list as $id) {
                    $tindividual = Tindividual::model()->findByPk($id->id);
                    $display++;
                    if (($display % $limit) == 0) {
                        echo 'Pk :' . $id->id . ', tijd ' . date('Y-m-d H:i:s') . ', done: ' . $display . ' = ' . (sprintf('%01.2f',
                                ($display * 100) / $count)) . "%\n";
                    }
                    try {
                        $this->export($tindividual->id);
                    } catch (Exception $ex) {
                        echo $ex->getMessage() . "\n";
                        print_r($tindividual->getErrors() . "\n");
                    }
                    unset($tindividual);
                }
            }
            unset($list);
        }

        $criteria = new CDbCriteria;
        $criteria->select = 'id';
        $criteria->condition = $update->condition;
        $count = Tindividual::model()->count($criteria);
        echo 'Left : ' . $count . "\n";

        $this->printEindTijd();
        echo '***** Einde ConvertIndividuals *****' . "\n";
    }

    public function export($tindividual) {

        if (!is_object($tindividual)) {
            $tindividual = Tindividual::model()->findByPk($tindividual);
        }

        $return = true;
        $individual = $this->findIndividual($tindividual);

        if ($individual != false) {

            if ((empty($individual->date_of_death) || $individual->date_of_death == '0000-00-00') && !empty($tindividual->date_of_death)) {
                $individual->date_of_death = $tindividual->date_of_death;
            }

            if (empty($individual->place_of_death) && !empty($tindividual->place_of_death)) {
                $individual->place_of_death = $tindividual->place_of_death;
            }

            if (empty($individual->country_of_death) && !empty($tindividual->country_of_death)) {
                $individual->country_of_death = str_to_upper($tindividual->country_of_death);
            }

            if ((empty($individual->date_of_birth) || $individual->date_of_birth == '0000-00-00') && !empty($tindividual->date_of_birth)) {
                $individual->date_of_birth = $tindividual->date_of_birth;
            }

            if (empty($individual->place_of_birth) && !empty($tindividual->place_of_birth)) {
                $individual->place_of_birth = $tindividual->place_of_birth;
            }

            if (empty($individual->country_of_birth) && !empty($tindividual->country_of_birth)) {
                $individual->country_of_birth = str_to_upper($tindividual->country_of_birth);
            }

            if ($individual->save()) {
                $tindividual->individual_id = $individual->id;
                $tindividual->deleted = 1;
                $tindividual->save();
            } else {
                $tindividual->error = 1;
                $tindividual->save();
                print_r($individual->getErrors());
                $return = false;
            }
        } else {
            $tindividual->error = 1;
            $tindividual->save();
            $return = false;
        }

        return $return;
    }

    private function findIndividual(Tindividual $tindividual, $update = false) {
        $return = false;
        if (!empty($tindividual->individual_id)) {
            $individual = Individual::model()->findByPk($tindividual->individual_id);
            if (!empty($individual)) {
                return $individual;
            }
        }

        if (!empty($tindividual->date_of_birth)) {
            $individual = Individual::model()->find('first_name=:firstname and last_name=:lastname and date_of_birth=:date_of_birth',
                    array(
                'firstname' => $tindividual->first_name,
                'lastname' => $tindividual->last_name,
                'date_of_birth' => $tindividual->date_of_birth,
            ));

            if (!empty($individual)) {
                return $individual;
            }

            $individual1 = Individual::model()->find('last_name=:lastname and date_of_birth=:date_of_birth',
                    array(
                'lastname' => $tindividual->last_name,
                'date_of_birth' => $tindividual->date_of_birth,
            ));

            if (!empty($individual1)) {
                return $individual1;
            }
        }

        $individual = Individual::model()->find('first_name=:firstname and last_name=:lastname',
                array('firstname' => $tindividual->first_name,
            'lastname' => $tindividual->last_name)
        );
        if (!empty($individual)) {
            return $individual;
        }

        if ($update){
            $individual = Individual::model()->find('date_of_birth=:date_of_birth and last_name like :lastname',
                    array(
                'lastname' => $tindividual->last_name,
                'date_of_birth' => $tindividual->date_of_birth,
            ));

            if (!empty($individual)) {
                return $individual;
            }
        }

        return $return;
    }

    /**
     * function to convert the content of GEL Motorsport People
     * there are only 26 files, for each letter of the alfa bet.
     * Each file contains several persons.
     */
    private static function convertContentGelPeople($list) {
        foreach ($list as $article) {
            echo 'article:' . $article->title . "\n";

            $text = $article->introtext . $article->fulltext;
            $lines = explode(chr(13), $text);
            $person = new Tindividual();
            $isBio = false;
            $readPerson = true;

            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {
                        // do the right stuff...
                        if (strpos(strtolower(trim($line)), '<table') !== false) {
                            $readPerson = true;
                        } else if ($readPerson && strpos(strtolower(trim($line)), '<h2>') !== false) {
                            $isBio = false;
                            $name = html_entity_decode(strip_tags($line));
                            $commaPos = strpos($name, ',');
                            $startPos = strpos($name, '(');

                            $person->last_name = trim(substr($name, 1, $commaPos - 1));
                            if ($startPos !== false) {
                                $person->first_name = trim(substr($name, $commaPos + 1, $startPos - $commaPos - 1));
                                $startPos = strpos($name, '(');
                                $endPos = strpos($name, ')');
                                $person->nationality = trim(substr($name, $startPos + 1, $endPos - $startPos - 1));
                            } else {
                                $person->first_name = trim(substr($name, $commaPos + 1));
                            }

                            // dates of birth and death
                            $person->content_id = $article->id;
                            //echo 'person:'.$person->first_name.' '.$person->last_name.', nat:'.$person->nationality."\n";
                        } else if ($readPerson && strpos(strtolower(trim($line)), '<h3>') !== false) {
                            $dates = html_entity_decode(strip_tags($line));
                            $dashPos = strpos(strtolower($dates), ' - ');
                            if ($dashPos !== false) {
                                $birth = trim(substr($dates, 1, $dashPos - 1));
                                $death = trim(substr($dates, $dashPos + 1));
                            } else {
                                $birth = $dates;
                            }

                            if (strpos(strtolower($birth), '(') !== false) {
                                //echo 'birth:'.trim($birth)."\n";
                                $startPos = strpos(strtolower($birth), '(');
                                $endPos = strpos(strtolower($birth), ')');
                                $person->place_of_birth = trim(substr($birth, $startPos + 1, $endPos - $startPos - 1));

                                $date = explode('/', trim(substr($birth, 2, $startPos - 2)));
                                $person->date_of_birth = date($date[2] . '-' . $date[1] . '-' . $date[0]); //new Date($date[1].'/'.$date[0].'/'.$date[2]);
                                //echo 'place:'.$person->place_of_birth.',date:'. $person->date_of_birth."\n";
                            } else {
                                if (!empty($birth)) {
                                    $date = explode('/', trim(substr($birth, 2)));
                                    $person->date_of_birth = date($date[2] . '-' . $date[1] . '-' . $date[0]); //new Date($date[1].'/'.$date[0].'/'.$date[2]);
                                }
                            }
                            if ($dashPos > 0 && strpos(strtolower($death), '(') != false) {
                                $startPos = strpos(strtolower($death), '(');
                                $endPos = strpos(strtolower($death), ')');
                                $person->place_of_death = trim(substr($death, $startPos + 1, $endPos - $startPos - 1));

                                $date = explode('/', trim(substr($death, 2, $startPos - 2)));
                                $person->date_of_death = date($date[2] . '-' . $date[1] . '-' . $date[0]); //new Date($date[1].'/'.$date[0].'/'.$date[2]);
                            } else {
                                if (!empty($death)) {
                                    $date = explode('/', trim(substr($death, 2, $startPos - 2)));
                                    $person->date_of_death = date($date[2] . '-' . $date[1] . '-' . $date[0]); //new Date($date[1].'/'.$date[0].'/'.$date[2]);
                                }
                            }

                            unset($birth);
                            unset($death);
                        } else if (stristr($line, '</table>') !== false) {
                            $update = Tindividual::model()->find('first_name=:first and last_name=:last and content_id = :content',
                                    array('first' => $person->first_name,
                                'last' => $person->last_name,
                                'content' => $person->content_id
                            ));
                            if (empty($update)) {
                                if (!$person->save()) {
                                    echo 'update ' . $person->first_name . ' ' . $person->last_name . "\n";
                                    print_r($person->getErrors());
                                }
                            } else {
                                $update->date_of_birth = $person->date_of_birth;
                                $update->place_of_birth = $person->place_of_birth;
                                $update->date_of_death = $person->date_of_death;
                                $update->place_of_death = $person->place_of_death;
                                $update->nationality = $person->nationality;
                                $update->description = $person->description;
                                if (!$update->save()) {
                                    echo 'update ' . $person->first_name . ' ' . $person->last_name . "\n";
                                    print_r($person->getErrors());
                                }
                            }

                            $person = new Tindividual();
                            $readPerson = false;
                        } else if ($readPerson && $isBio) {
                            $person->description = $person->description . chr(13) . $line;
                        } else if ($readPerson && (strpos(strtolower($line), '<pre>') > 0 || strpos(strtolower($line),
                                        '<p>') > 0)) {
                            $isBio = true;
                            $person->description = html_entity_decode($line);

                            // end of the bio, insert or update:
                        } else if ($readPerson && (strpos(strtolower($line), '</pre>') > 0 || strpos(strtolower($line),
                                        '</p>') > 0)) {

                            $person->description = $person->description . chr(13) . html_entity_decode($line);
                            $isBio = false;
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";
                } // try
            } // count($lines)
        } // foreach $this->list
    }

    /**
     * function to convert the content of GEL Motorsport F1 drivers.
     * each article is a new person
     */
    private static function convertContentGelDrivers($list) {
        foreach ($list as $article) {
            $text = $article->introtext . $article->fulltext;
            $lines = explode(chr(13), $text);
            $person = new Tindividual();
            $isBio = false;
            echo 'article:' . $article->title . ' contains ' . count($lines) . 'lines.' . "\n";
            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {
                        // do the right stuff...
                        // the name of the person
                        //echo 'line'.trim($line)."\n";
                        if (strpos(strtolower($line), '<h2>') !== false) {
                            $isBio = false;
                            $name = html_entity_decode(strip_tags($line));
                            $commaPos = strpos($name, ',');
                            $startPos = strpos($name, '(');

                            $person->last_name = trim(substr($name, 1, $commaPos - 1));
                            if ($startPos > 0) {
                                $person->first_name = trim(substr($name, $commaPos + 1, $startPos - $commaPos - 1));
                                $startPos = strpos($name, '(');
                                $endPos = strpos($name, ')');
                                $person->nationality = trim(substr($name, $startPos + 1, $endPos - $startPos - 1));
                            } else {
                                $person->first_name = trim(substr($name, $commaPos + 1));
                            }

                            // dates of birth and death
                        } else if (strpos(strtolower($line), '<h3>') !== false) {
                            $dates = html_entity_decode(strip_tags($line));
                            $dashPos = strpos(strtolower($dates), '-');
                            if ($dashPos !== false) {
                                $birth = trim(substr($dates, 1, $dashPos - 1));
                                $death = trim(substr($dates, $dashPos + 1));
                            } else {
                                $birth = $dates;
                            }

                            if (strpos(strtolower($birth), '(') !== false) {
                                $startPos = strpos(strtolower($birth), '(');
                                $endPos = strpos(strtolower($birth), ')');
                                $person->place_of_birth = trim(substr($birth, $startPos + 1, $endPos - $startPos - 1));

                                $date = explode('/', trim(substr($birth, 2, $startPos - 2)));
                                $person->date_of_birth = date($date[2] . '-' . $date[1] . '-' . $date[0]); //new Date($date[1].'/'.$date[0].'/'.$date[2]);
                            }
                            if ($dashPos > 0 && strpos(strtolower($death), '(') !== false) {
                                $startPos = strpos(strtolower($death), '(');
                                $endPos = strpos(strtolower($death), ')');
                                $person->place_of_death = trim(substr($death, $startPos + 1, $endPos - $startPos - 1));

                                $date = explode('/', trim(substr($death, 2, $startPos - 2)));
                                $person->date_of_death = date($date[2] . '-' . $date[1] . '-' . $date[0]); //new Date($date[1].'/'.$date[0].'/'.$date[2]);
                            }

                            unset($birth);
                            unset($death);
                        } else if (strpos(strtolower($line), '<pre>') !== false) {
                            $isBio = true;
                            $person->description = html_entity_decode($line);


                            // end of the bio, insert or update:
                        } else if (strpos(strtolower($line), '</pre>') !== false) {
                            $person->content_id = $article->id;
                            $person->description = $person->description . chr(13) . html_entity_decode($line);
                            $isBio = false;

                            $update = Tindividual::model()->find('first_name=:first and last_name=:last and content_id = :content',
                                    array('first' => $person->first_name,
                                'last' => $person->last_name,
                                'content' => $person->content_id
                            ));



                            if (empty($update)) {
                                if (!$person->save()) {
                                    echo 'Create ' . $person->first_name . ' ' . $person->last_name . ' (' . $person->nationality . ')' . "\n";
                                    echo 'birth:' . $person->date_of_birth . ', death:' . $person->date_of_death . "\n";

                                    print_r($person->getErrors());
                                }
                            } else {
                                $update->date_of_birth = $person->date_of_birth;
                                $update->place_of_birth = $person->place_of_birth;
                                $update->date_of_death = $person->date_of_death;
                                $update->place_of_death = $person->place_of_death;
                                $update->description = $person->description;
                                if (!$update->save()) {
                                    echo 'update ' . $person->first_name . ' ' . $person->last_name . "\n";
                                    print_r($person->getErrors());
                                }
                            }

                            $person = new Tindividual();
                        } else if ($isBio) {
                            $person->description = $person->description . chr(13) . $line;
                        }
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";
                } // try
            } // count($lines)
        } // foreach $this->list
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tindividual the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

