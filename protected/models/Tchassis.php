<?php

/**
 * This is the model class for table "{{tracks_tvehicles}}".
 *
 * The followings are the available columns in table '{{tracks_tvehicles}}':
 * @property integer $id
 * @property string $filename
 * @property string $tmake
 * @property string $ttype
 * @property string $chassis
 * @property string $tengine
 * @property string $year
 * @property string $group
 * @property string $first_owner
 * @property string $next_owners
 * @property string $comment
 * @property integer $make_id
 * @property integer $type_id
 * @property integer $vehicle_id
 * @property integer $engine_id
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Tchassis extends CActiveRecord {

    /* class static variables */
    private static $categoryId = 6;
    /**
     * Returns the static model of the specified AR class.
     * @return Tchassis the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_tvehicles}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created', 'required'),
            array('make_id, type_id, vehicle_id, engine_id, published, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('filename, tmake, ttype, tchassis, tengine, group', 'length', 'max' => 100),
            array('year', 'length', 'max' => 20),
            array('first_owner, next_owners', 'length', 'max' => 500),
            array('comment, checked_out_time, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, filename, tmake, ttype, tchassis, tengine, year, group, first_owner, next_owners, comment, make_id, type_id, engine_id, vehicle_id, published, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'make' => array(self::BELONGS_TO, 'Make', 'make_id'),
            'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
            'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicle_id'),
            'Engine' => array(self::BELONGS_TO, 'Engine', 'engine_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'filename' => 'Filename',
            'tmake' => 'Tmake',
            'ttype' => 'Ttype',
            'tchassis' => 'Tchassis',
            'tengine' => 'Tengine',
            'year' => 'Year',
            'group' => 'Group',
            'first_owner' => 'First Owner',
            'next_owners' => 'Next Owners',
            'comment' => 'Comment',
            'make_id' => 'Make',
            'type_id' => 'Type',
            'vehicle_id' => 'Vehicle',
            'engine_id' => 'Engine',
            'published' => 'Published',
            'ordering' => 'Ordering',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
        );
    }

    public function behaviors() {
        return array(
            'AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    public function beforeSave() {
        if (empty($this->tmake)) {
            $this->tmake = null;
        }
        if (empty($this->year) || trim($this->year) == '&nbsp;') {
            $this->year = null;
        }
        if (empty($this->group) || trim($this->group) == '&nbsp;') {
            $this->group = null;
        }
        if (empty($this->tengine) || trim($this->tengine) == '&nbsp;') {
            $this->tengine = null;
        }
        if (empty($this->first_owner) || trim($this->first_owner) == '&nbsp;') {
            $this->first_owner = null;
        }
        if (empty($this->next_owners) || trim($this->next_owners) == '&nbsp;') {
            $this->next_owners = null;
        }
        if (empty($this->comment) || trim($this->comment) == '&nbsp;') {
            $this->comment = null;
        }
        if ($this->deleted == 1) {
            $this->deleted_date = date("Y-m-d H:i:s");
        } else {
            $this->deleted_date = null;
        }

        return parent::beforeSave();
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
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('tmake', $this->tmake, true);
        $criteria->compare('ttype', $this->ttype, true);
        $criteria->compare('tchassis', $this->tchassis, true);
        $criteria->compare('tengine', $this->tengine, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('group', $this->group, true);
        $criteria->compare('first_owner', $this->first_owner, true);
        $criteria->compare('next_owners', $this->next_owners, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('make_id', $this->make_id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('vehicle_id', $this->vehicle_id);
        $criteria->compare('published', $this->published);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('done', 0);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    public function export() {
        try {
            // chassisnumber should not be empty:
            if (empty($this->tchassis) || trim($this->tchassis) == '&nbsp;') {
                $this->done = 1;
                return $this->save();
            }

            $ttype = $this->convertType($this);
            $tchassis = $this->convertChassis($this, $ttype);

            //echo 'ttype: '.$ttype."\n";
            //echo 'chassis: '.$chassis."\n";
            //die;

            if (empty($this->type_id)) {
                $type = Type::model()->with('make')->find('lower(concat(make.name," ",t.name))=lower(:type)', array(':type' => $ttype));
                if (!empty($type->id)) {
                    $this->type_id = $type->id;
                    $this->make_id = $type->make_id;
                } else {
                    return false;
                }
            }

            if (empty($this->vehicle_id)) {
                if ($tchassis == $this->tchassis) {
                    // check if the Vehicle already exists:
                    $vehicle = Vehicle::model()->find(
                            'type_id=:type_id and chassisnumber=:chassis', array('type_id' => $this->type_id, 'chassis' => $tchassis)
                    );
                    $this->vehicle_id = $vehicle->id;
                } else {
                    //
                    $new = Vehicle::model()->find(
                            'type_id=:type_id and chassisnumber=:chassis', array('type_id' => $this->type_id, 'chassis' => $tchassis)
                    );
                    $old = Vehicle::model()->find(
                            'type_id=:type_id and chassisnumber=:chassis', array('type_id' => $this->type_id, 'chassis' => $this->tchassis)
                    );

                    if (!empty($new->id)) {
                        $this->vehicle_id = $new->id;
                    } else if (!empty($old->id)) {
                        $this->vehicle_id = $old->id;
                    }
                }
            }

            if (empty($this->vehicle_id)) {
                $vehicle = new Vehicle();
                $vehicle->type_id = $this->type_id;
                $vehicle->chassisnumber = $chassis;
                $vehicle->engine = $this->tengine;
                $vehicle->year = $this->year;
                $vehicle->group = $this->group;
                $vehicle->first_owner = $this->first_owner;
                $vehicle->next_owners = $this->next_owners;
                $vehicle->comment = $this->comment;
                $vehicle->published = 1;
                echo 'beforeSave -> vehicle';
                if ($vehicle->save()) {
                    $this->vehicle_id = $vehicle->id;
                    $this->deleted = 1;
                    return $this->save();
                } else {
                    return false;
                }
            } else {
                $vehicle = Vehicle::model()->findByPk($this->vehicle_id);
                if (!empty($vehicle->id)) {
                    if ($chassis != $vehicle->chassisnumber) {
                        $vehicle->chassisnumber = $chassis;
                    }
                    if (empty($vehicle->year) && !empty($this->year) && trim($this->year) != '&nbsp;') {
                        $vehicle->year = $this->year;
                    }

                    if (in_array(trim($ttype), array('Ferrari 250 TR', 'Ferrari 250 TR/58', 'Ferrari 250 TR/59', 'Ferrari 312 P', 'Ferrari 340 MM', 'Ferrari 375 MM', 'Porsche 908', 'Porsche 908/02', 'Porsche 908/03'))) {
                        if ($this->tengine != '&nbsp;') {
                            $vehicle->model = $this->tengine;
                            $vehicle->engine = '';
                        }
                    } else if (empty($vehicle->engine) && !empty($this->tengine) && trim($this->tengine) != '&nbsp;') {
                        $vehicle->model = '';
                        $vehicle->engine = $this->tengine;
                    }

                    if (empty($vehicle->group) && !empty($this->group) && trim($this->group) != '&nbsp;') {
                        $vehicle->group = $this->group;
                    }
                    if (empty($vehicle->first_owner) && !empty($this->first_owner) && trim($this->first_owner) != '&nbsp;') {
                        $vehicle->first_owner = $this->first_owner;
                    }
                    if (empty($vehicle->next_owners) && !empty($this->next_owners) && trim($this->next_owners) != '&nbsp;') {
                        $vehicle->next_owners = $this->next_owners;
                    }
                    if (empty($vehicle->remarks) && !empty($this->comment) && trim($this->comment) != '&nbsp;') {
                        $vehicle->remarks .= $this->comment;
                    }
                    echo 'beforeSave2 -> vehicle';
                    echo 'id: ' . $vehicle->id;
                    echo ',type_id: ' . $vehicle->type_id;
                    if ($vehicle->save()) {
                        $this->deleted = 1;
                        echo 'beforeSave -> this';
                        return $this->save();
                    } else {
                        return false;
                    }
                } else {
                    echo 'Vehicle not found!' . $this->vehicle_id . "\n";
                    return false;
                }
            }
        } catch (Exception $ex) {
            echo 'make: ' . $this->tmake . "\n" .
            'type:' . $this->ttype . "\n" .
            'chassis:' . $this->tchassis . "\n" .
            'error:' . $ex->getMessage() . "\n";
            return false;
        }
    }

    //
    public function exportChassis() {
        $update = new CDbCriteria;
        $update->condition = 'deleted=1';
        Tchassis::model()->updateAll(array('deleted' => '0'), $update);

        $error = 0;
        $list = Tchassis::model()->findAll('ttype is not null and ttype is not null and deleted=0');
        echo 'Gevonden:' . count($list) . "\n";
        foreach ($list as $item) {
            echo 'make:' . $item->tmake . ', type:' . $item->ttype . ', chassis:' . $item->tchassis . "\n";
            if (!$item->export()) {
                $error++;
                echo 'error => make:' . $item->tmake . ', type:' . $item->ttype . ', chassis:' . $item->tchassis . "\n";
            };
        }

        echo 'Error : ' . $error . "\n";
    }

    /**
     *
     * @name convertChassis
     * @abstract converts the chassis into a stored format
     * @param unknown_type $tvehicle
     * @return string
     */
    private function convertChassis($tvehicle, $ttype) {
        $chassis = str_replace(' ', '', trim($tvehicle->tchassis));

        if (trim($tvehicle->tmake) == 'Argo') {
            $pos1 = strpos($tvehicle->tchassis, '/');
            $pos2 = strpos($tvehicle->tchassis, '/', $pos1 + 1);
            $chassis = substr($tvehicle->tchassis, $pos1 + 1, $pos2 - $pos1 - 1);
        } elseif (in_array(trim($tvehicle->tmake), array('Sauber', 'Spice', 'Tiga'))) {
            $chassis = $this->cutAfterChar($chassis, '-');
        } elseif (trim($tvehicle->tmake) == 'Zytek') {
            $chassis = substr($chassis, -2);
        } elseif (substr($chassis, 0, 9) == 'F131EVOGT') {
            $chassis = substr($chassis, -4);
        } elseif (in_array(substr($chassis, 0, 8), array('993-GT1-'))) {
            $chassis = substr($chassis, 8, 20);
        } elseif (in_array(substr($chassis, 0, 7), array('908/02-', '908/03-', '917/10-', '917/20-', '917/30-', 'B2K/40-', 'GT40M3/', 'GT1/98-'))) {
            $chassis = substr($chassis, 7, 20);
        } elseif (in_array(substr($chassis, 0, 6), array('312PB-', '333SP-', 'B0540-', 'B0610-', 'B2K10-', 'B9810-', 'GT40P/', 'TS010-'))) {
            $chassis = substr($chassis, 6, 20);
        } elseif (in_array(substr($chassis, 0, 5), array('727C-', '737C-', '88CV-', '89CV-', '90CV-', '92CV-', 'GT40/'))) {
            $chassis = substr($chassis, 5, 20);
        } elseif (in_array(substr($chassis, 0, 4), array('206-', '312P', '550A', 'GTSR', 'T260', 'T290', 'T292', 'T294', 'T310', 'T333', 'T380', 'T390', 'T530'))) {
            $chassis = trim(substr($chassis, 5, 20));
        } elseif (in_array(substr($chassis, 0, 3), array('2KQ', '550', '718', '904', '905', '906', '907', '908', '909', '917', 'B16', 'B19', 'B21', 'B22', 'B26', 'B31', 'B36', 'M1A', 'M1B', 'M6B', 'M8C', 'M8E'))) {
            $chassis = substr($chassis, 4, 10);
        } elseif (in_array(substr($chassis, 0, 3), array('S7-'))) {
            $chassis = substr($chassis, 3, 10);
        } elseif (in_array(strtolower(trim($tvehicle->ttype)), array('lola t290 series', 'lola t220 series', 'lola group c and imsa gtp:'))
                && in_array(substr($chassis, 0, 3), array('T22', 'T29', 'T60', 'T61', 'T71', 'T81'))
        ) {
            $tvehicle->ttype = 'Lola ' . substr($chassis, 0, 4);
            $chassis = substr($chassis, 5, 10);
        } elseif (in_array(strtolower(trim($tvehicle->ttype)), array('lola t160 series'))
                && in_array(substr($chassis, 0, 4), array('SL16'))
        ) {
            $tvehicle->ttype = 'Lola T' . substr($chassis, 2, 3);
        } elseif ($tvehicle->tmake == 'Courage') {
            if (in_array(substr($chassis, 0, 4), array('LC70'))) {
                $chassis = substr($chassis, 5, 20);
            }
        } elseif (trim($tvehicle->ttype) == 'Ferrari 166 MM'
                && in_array(substr($chassis, 0, 8), array('166MM/53'))
        ) {
            $chassis = substr($chassis, 9, 20);
        } elseif (in_array(substr($chassis, 0, 5), array('166MM'))) {
            $chassis = substr($chassis, 6, 20);
        } elseif (trim($tvehicle->ttype) == 'Ferrari Dino 206 S') {
            $tvehicle->ttype = 'Ferrari Dino 206S';

            if (in_array(substr($chassis, 0, 5), array('206S-'))) {
                $chassis = '0' . substr($chassis, 6, 20);
            }
        } elseif (trim($tvehicle->ttype) == 'Ferrari 365 GTB/4 Daytona'
                && in_array(substr($chassis, 0, 8), array('365GTB4-'))) {
            $chassis = substr($chassis, 8, 20);
        } elseif (trim($tvehicle->tmake) == 'Mosler') {
            if (trim($ttype) == 'Mosler MT900R GT3') {
                $chassis = substr(trim($chassis), -4);
            } else {
                $chassis = $this->cutAfterChar($chassis, '-');
            }
        }

        return $chassis;
    }

    private function convertType($tvehicle) {

        $ttype = trim(str_replace(':', '', $tvehicle->ttype));
        $ttype = trim(str_replace('chassis', '', $ttype));
        $ttype = trim(str_replace('numbers', '', $ttype));
        $ttype = trim(str_replace('number', '', $ttype));

        if (in_array(substr($ttype, 0, 11), array('Chevron B16', 'Chevron B19', 'Chevron B21', 'Chevron B23', 'Chevron B26', 'Chevron B31', 'Chevron B36'))) {
            $ttype = substr($ttype, 0, 11);
        } elseif (substr($ttype, 0, 20) == 'Chrysler Viper GTS-R') {
            $ttype = 'Chrysler Viper GTS-R';
        } elseif (trim($ttype) == 'Ferrari 250 GT SWB Competition') {
            $ttype = 'Ferrari 250 GT SWB';
        } elseif (trim($ttype) == 'Ferrari 250 TR58') {
            $ttype = 'Ferrari 250 TR/58';
        } elseif (trim($ttype) == 'Ferrari 250 TR59') {
            $ttype = 'Ferrari 250 TR/59';
        } elseif (substr(trim($ttype), 0, 16) == 'Ferrari F430 GTC') {
            $ttype = 'Ferrari F430 GTC';
        } elseif (trim($ttype) == 'Ferrari F430 GT3 chassis') {
            $ttype = 'Ferrari F430 GT3';
        } elseif (trim($ttype) == 'Lola Mk.1') {
            $ttype = 'Lola Mk. I';
        } elseif (trim($ttype) == 'Lola Mk.6 GT') {
            $ttype = 'Lola Mk. VI GT';
        } elseif (in_array(trim(strtolower($ttype)), array('lola b05/40 series', 'lola b06/10 series'))) {
            $ttype = trim(str_replace('series', '', trim($ttype)));
        } elseif (in_array($ttype, array('Lola T70 Mk.3B (Spyders):', 'Lola T70 Mk.3B GT Coupe:'))) {
            $ttype = 'Lola T70 Mk.3B';
        } elseif (in_array($ttype, array('Lola T70 Mk.3 (Coupes & Spyders)'))) {
            $ttype = 'Lola T70 Mk.3';
        } elseif (trim($ttype) == 'McLaren M1A / McLaren Elva Mark I') {
            $ttype = 'McLaren M1A';
        } elseif (trim($ttype) == 'McLaren M1B / McLaren Elva Mark II') {
            $ttype = 'McLaren M1B';
        } elseif (trim($ttype) == 'McLaren M1C / McLaren Elva Mark III') {
            $ttype = 'McLaren M1C';
        } elseif (trim($ttype) == 'All McLaren F1 GTR built by') {
            $ttype = 'McLaren F1 GTR';
        } elseif (trim($tvehicle->tmake) == 'Mazda') {
            if (in_array(substr($tvehicle->tchassis, 0, 5), array('727C-', '737C-'))) {
                $ttype = 'Mazda ' . substr($tvehicle->tchassis, 0, 4);
            }
        } elseif (trim($ttype) == 'Porsche 718 RS 60') {
            $ttype = 'Porsche 718 RS60';
        } elseif (trim($ttype) == 'Porsche 718 RS 61') {
            $ttype = 'Porsche 718 RS61';
        } elseif (trim($ttype) == 'Porsche 911 Carrera RSR 2.8 (1973)') {
            $ttype = 'Porsche 911 Carrera RSR 2.8';
        } elseif (trim($ttype) == 'Porsche 911 Carrera RS 3.0 (1974)') {
            $ttype = 'Porsche 911 Carrera RS 3.0';
        } elseif (trim($ttype) == 'Porsche 911 Carrera RSR 3.0 (1974-1975)') {
            $ttype = 'Porsche 911 Carrera RSR 3.0';
        } elseif (trim($ttype) == 'Porsche 911 Carrera RSR (factory 1973-1974)') {
            $ttype = 'Porsche 911 Carrera RSR';
        } elseif (trim($ttype) == 'Porsche 911 GT2 \'98') {
            $ttype = 'Porsche 911 GT2/98';
        } elseif (trim($ttype) == 'Porsche 911 GT1-98') {
            $ttype = 'Porsche 911 GT1/98:';
        } elseif (trim($ttype) == 'Porsche 911 R') {
            $ttype = 'Porsche 911R';
        } elseif (strpos(trim($ttype), 'Porsche 914/6') > 0 || substr(trim($ttype), 0, 13) == 'Porsche 914/6') {
            $ttype = 'Porsche 914/6';
        } elseif (trim($ttype) == 'Porsche 934 (1976 customer cars)') {
            $ttype = 'Porsche 934';
        } elseif (trim($ttype) == 'Riley &amp; Scott Mk III') {
            $ttype = 'Riley & Scott Mk III';
        } elseif (trim($ttype) == 'Riley &amp; Scott Mk III C') {
            $ttype = 'Riley & Scott Mk IIIC';
        } elseif (trim($ttype) == 'Riley Mk XI chassis') {
            $ttype = 'Riley & Scott Mk XI';
        } elseif (trim($ttype) == 'Siata ST') {
            $ttype = 'Siata 300BC';
        } elseif (trim($ttype) == 'Stanguellini 750') {
            $ttype = 'Stanguellini 750 Sport';
        } elseif (trim($ttype) == 'Toyota group C cars') {
            if (substr($tvehicle->tchassis, 0, 3) == '87C') {
                $ttype = 'Toyota 87C';
            } elseif (substr($tvehicle->tchassis, 0, 4) == '88CV') {
                $ttype = 'Toyota 88CV';
            } elseif (substr($tvehicle->tchassis, 0, 4) == '89CV') {
                $ttype = 'Toyota 89CV';
            } elseif (substr($tvehicle->tchassis, 0, 4) == '90CV') {
                $ttype = 'Toyota 90CV';
            } elseif (substr($tvehicle->tchassis, 0, 4) == '92CV') {
                $ttype = 'Toyota 92CV';
            } elseif (substr($tvehicle->tchassis, 0, 5) == 'TS010') {
                $ttype = 'Toyota TS010';
            }
        } elseif (trim($ttype) == 'Toyota GT-One') {
            $ttype = 'Toyota GT-ONE';
        } elseif (trim($tvehicle->tmake) == 'Argo') {
            $pos = strpos($tvehicle->tchassis, '/');
            $ttype = 'Argo ' . substr($tvehicle->tchassis, 0, $pos);
        } elseif (trim($tvehicle->tmake) == 'Sauber') {
            $pos = strpos($tvehicle->tchassis, '-');
            $ttype = 'Sauber ' . substr($tvehicle->tchassis, 0, $pos);
        } elseif (trim($tvehicle->tmake) == 'Spice') {
            $pos = strpos($tvehicle->tchassis, '-');
            $ttype = 'Spice ' . substr($tvehicle->tchassis, 0, $pos);
        } elseif (trim($tvehicle->tmake) == 'Tiga') {
            $pos = strpos($tvehicle->tchassis, '-');
            $ttype = 'Tiga ' . substr($tvehicle->tchassis, 0, $pos);
        } elseif (trim($tvehicle->tmake) == 'Zytek') {
            $ttype = 'Zytek ' . substr($tvehicle->tchassis, 0, 3);
        }

        return $ttype;
    }

    /**
     * @name readContent
     * @abstract reads the Content-table and converts it into tchassis
     */
    public function readContent() {

        $list = Content::model()->findAll('catid=:catid', array('catid' => $this->categoryId));
        //
        echo 'Articles:' . count($list) . "\n";
        foreach ($list as $article) {
            // keep track on the articles:
            echo 'article:' . $article->title . "\n";
            $text = $article->fulltext;
            if (empty($article->fulltext)) {
                $text = $article->introtext;
            }

            $cnt = 0;
            $lines = explode(chr(13), $text);
            if (count($lines) > 1) {
                $make = '';
                $type = '';
                $chassis = false;
                $row = false;
                $data = '';
                $column = 0;
                // now loop over the lines...
                foreach ($lines as $line) {
                    // Fetch the make from <h1>- tags
                    if (strpos(strtolower($line), '<h1') > 0
                            && strpos(strtolower($line), '</h1>') > 0) {
                        $make = substr($line
                                , (strpos(strtolower($line), '>') + 1)
                                , (strpos(strtolower($line), 'chassis numbers') - strpos(strtolower($line), '>') - 1)
                        );
                    }
                    // feth the type from <h3> tags
                    if (strpos(strtolower($line), '<h3') > 0
                            && strpos(strtolower($line), '</h3>') > 0
                    ) {
                        $type = substr($line, (strpos(strtolower($line), '>') + 1), (strpos(strtolower($line), '</h3>') - strpos(strtolower($line), '>') - 1)
                        );
                    }
                    // fetch the chassisnumbers....
                    if (!$chassis
                            && strpos(strtolower($line), '<table') > 0
                            && strpos(strtolower($line), 'class="chassis"') > 0
                    ) {
                        $chassis = true;
                    } elseif ($chassis && strpos(strtolower($line), '<tr') > 0) {
                        $row = true;
                        $column = 0;
                    } elseif ($chassis
                            && $row
                            && strpos(strtolower($line), '<td') > 0
                            && strpos(strtolower($line), '</td>') > 0
                    ) {
                        $data[$column] = htmlspecialchars_decode
                                (substr($line
                                        , (strpos(strtolower($line), '>') + 1)
                                        , (strpos(strtolower($line), '</td>') - strpos(strtolower($line), '>') - 1)
                                )
                        );
                        $column++;
                    } elseif ($chassis && $row && strpos(strtolower($line), '</tr>') > 0) {
                        if (!empty($data) && $column > 0 && !empty($make)) {
                            $tchassis = Tchassis::model()->find('filename=:file and tmake=:make and ttype=:type and chassis=:chassis', array('file' => $article->title,
                                'make' => $make,
                                'type' => $type,
                                'chassis' => $data[0]
                                    )
                            );
                            try {
                                if (empty($tchassis->id)) {
                                    // add a new vehicle:
                                    $tchassis = new Tchassis();
                                    $tchassis->filename = $article->title;
                                    $tchassis->tmake = $make;
                                    $tchassis->ttype = $type;
                                    $tchassis->tchassis = $data[0];
                                }
                                $tchassis->tengine = $data[1];
                                $tchassis->year = $data[2];
                                $tchassis->group = $data[3];
                                $tchassis->first_owner = $data[4];
                                $tchassis->next_owners = $data[5];
                                $tchassis->comment = $data[6];
                                $tchassis->deleted = 0;
                                $tchassis->save();
                            } catch (Exception $ex) {
                                echo 'Exception:' . $ex->getMessage() . "\n";
                                echo 'Make : ' . $make . "\n";
                                echo 'Type : ' . $type . "\n";
                                print_r($data);
                            }
                            $data = '';
                        }
                        $row = false;
                    } elseif ($chassis && strpos(strtolower($line), '</table>') > 0) {
                        $chassis = false;
                    }
                } // foreach $lines
            } // count($lines)
        }
    }

    private function cutAfterChar($chassis, $character) {
        $pos = strpos($chassis, $character);
        return substr($chassis, $pos + 1, 10);
    }

}