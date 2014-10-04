<?php

/**
 * This is the model class for table "{{tracks_tvehicles}}".
 *
 * The followings are the available columns in table '{{tracks_tvehicles}}':
 * @property integer $id
 * @property string $tvehicle
 * @property string $tchassis
 * @property string $tlicenseplate
 * @property integer $make_id
 * @property integer $type_id
 * @property integer $vehicle_id
 * @property integer $engine_id
 * @property string $created
 * @property string $modified
 */
class Tvehicle extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return Tvehicle the static model class
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
            array('make_id, type_id, vehicle_id, engine_id', 'numerical', 'integerOnly' => true),
            array('tvehicle', 'length', 'max' => 255),
            array('tchassis, tlicenseplate', 'length', 'max' => 50),
            array('modified', 'safe'),
            // foreign key checks:
            array('make_id', 'exist', 'attributeName' => 'id', 'className' => 'Make'),
            array('type_id', 'exist', 'attributeName' => 'id', 'className' => 'Type'),
            array('vehicle_id', 'exist', 'attributeName' => 'id', 'className' => 'Vehicle'),
            array('engine_id', 'exist', 'attributeName' => 'id', 'className' => 'Engine'),
            // Unique multi column:
            array(
                'tvehicle+tchassis',
                'uniqueMultiColumnValidator',
                'allowEmpty' => true,
                'caseSensitive' => false
            ),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tvehicle, tchassis, tlicenseplate, make_id, type_id, vehicle_id, engine_id, created, modified', 'safe', 'on' => 'search'),
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
            'engine' => array(self::BELONGS_TO, 'Engine', 'engine_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tvehicle' => 'Tvehicle',
            'tchassis' => 'Tchassis',
            'tlicenseplate' => 'Tlicenseplate',
            'make_id' => 'Make',
            'type_id' => 'Type',
            'vehicle_id' => 'Vehicle',
            'engine_id' => 'Engine',
            'created' => 'Created',
            'modified' => 'Modified',
        );
    }

    public function beforeSave() {

        if (empty($this->tvehicle)) {
            $this->tvehicle = null;
        }
        if (empty($this->tmake)) {
            $this->tmake = null;
        }
        if (empty($this->ttype)) {
            $this->ttype = null;
        }
        if (!empty($this->type_id)) {
            $type = Type::model()->findByPk($this->type_id);
            $this->make_id = $type->make_id;
        }
        // some business ruling to check if this record is done:
        $this->done = 0;
        if (empty($this->tchassis)) {
            if (!empty($this->make_id)) {
                $this->done = 1;
            }
        } else {
            if (!empty($this->vehicle_id)) {
                $this->done = 1;
            }
        }

        return parent::beforeSave();
    }

    public function behaviors() {
        return array('AutoTimestampBehavior' => array('class' => 'AutoTimestampBehavior'),
            'ERememberFiltersBehavior' => array(
                'class' => 'ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    public function export($fullcheck = true) {
        if (empty($this->make_id) && empty($this->type_id)) {
            $this->convertTvehicle($fullcheck);
        }

        $tchassis = str_replace(' ', '', trim($this->tchassis));
        $tchassis = str_replace('?', '', trim($this->tchassis));
        if (!empty($tchassis)) {
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

            try {
                if (empty($this->vehicle_id)) {
                    //echo 'tchassis'.$tchassis;
                    $vehicle = new Vehicle();
                    $vehicle->type_id = $this->type_id;
                    $vehicle->chassisnumber = $tchassis;
                    $vehicle->published = 1;
                    if ($vehicle->save()) {
                        $this->done = 1;
                        $this->vehicle_id = $vehicle->id;
                        return $this->save();
                    } else {
                        return false;
                    }
                } else {
                    $vehicle = Vehicle::model()->findByPk($this->vehicle_id);
                    if ($tchassis != $vehicle->chassisnumber) {
                        $vehicle->chassisnumber = $tchassis;
                    }
                    if ($vehicle->save()) {
                        $this->vehicle_id = $vehicle->id;
                        $this->done = 1;
                        if ($this->save()) {
                            return true;
                        } else {
                            print_r($this->getErrors());
                            return false;
                        }
                    } else {
                        print_r($vehicle->getErrors());
                        return false;
                    }
                }
            } catch (Exception $ex) {
                echo 'make:' . $item->tmake . ', type:' . $item->ttype . ', chassis:' . $item->tchassis . 'error:' . $ex->getMessage() . "\n";
                return false;
            }
        } else {
            $this->done = 1;
            return $this->save();
        }
    }

    //
    public function exportVehicles() {
        $error = 0;
        $list = Tvehicle::model()->findAll('tvehicle is not null and done=0');
        echo 'Gevonden:' . count($list) . "\n";
        foreach ($list as $item) {
            if (!$item->export(false)) {
                $error++;
                echo 'make:' . $item->tmake . ', type:' . $item->ttype . ', chassis:' . $item->tchassis . "\n";
            };
        }
        echo 'Error : ' . $error . "\n";
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
        $criteria->compare('tvehicle', $this->tvehicle, true);
        $criteria->compare('tchassis', $this->tchassis, true);
        $criteria->compare('tlicenseplate', $this->tlicenseplate, true);
        $criteria->compare('make_id', $this->make_id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('vehicle_id', $this->vehicle_id);
        $criteria->compare('engine_id', $this->engine_id);
        $criteria->compare('done', 0);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'Pagination' => array('pageSize' => 20,),
        ));
    }

    public function convertTvehicle($fullcheck = true) {

        $type = Type::model()->with('make')->find('concat(make.name," ",t.name)=:name', array('name' => $this->tvehicle));
        if (!empty($type->id)) {
            $this->type_id = $type->id;
            $this->make_id = $type->make_id;
            $this->save();
        } else {
            if ($fullcheck) {
                $vehicle = explode(' ', $this->tvehicle);
                $search = '';
                $cnt = count($vehicle);
                $saveCnt = 0;
                print_r($vehicle);
                for ($i = 1; $i <= $cnt; $i++) {
                    $search .= ' ' . $vehicle[$i - 1];
                    echo 'search:' . $search . "\n";
                    $type = Type::model()->with('make')->find('concat(make.name," ",t.name)=:name', array('name' => trim($search)));
                    if (!empty($type->id)) {
                        $this->type_id = $type->id;
                        $this->make_id = $type->make_id;
                        $this->save();
                        $saveCnt = $i;
                    } else {
                        $make = Make::model()->find('name=:name', array('name' => trim($search)));
                        if (!empty($make->id)) {
                            $this->make_id = $make->id;
                            $this->save();
                            $saveCnt = $i;
                        }
                    }
                    //$search = trim(str_replace($vehicle[$cnt - 1], '', $search));
                }
                // check for the engine:
                // obvious: there is a dash in the tvehicle:
                $pos = strpos($this->tvehicle, ' - ');
                if ($pos > 0) {
                    $tengine = substr($this->tvehicle, $pos + 3);
                    $alias = $this->getSlug($tengine);
                    $engine = Engine::model()->find('alias=:alias', array('alias' => $alias));
                    echo 'engine : ' . $tengine . ' id : ' . (isset($engine->id) ? $engine->getFullname() : '') . "\n";
                    if (!empty($engine->id)) {
                        $this->engine_id = $engine->id;
                        $this->save();
                    }
                }
                if (empty($this->engine_id) && !empty($saveCnt)) {
                    $saveCnt++;
                    $tengine = '';
                    echo 'save:' . $saveCnt . "\n";
                    for ($i = $saveCnt; $i <= $cnt; $i++) {
                        $tengine .= ' ' . $vehicle[$i - 1];
                        echo 'engine:' . $tengine . "\n";
                        $alias = $this->getSlug($tengine);
                        $engine = Engine::model()->find('alias=:alias', array('alias' => $alias));
                        echo 'engine : ' . $tengine . ' id : ' . (isset($engine->id) ? $engine->getFullname() : '') . "\n";
                        if (!empty($engine->id)) {
                            $this->engine_id = $engine->id;
                            $this->save();
                        }
                    }
                }
            }
        }
        return true;
    }

}
