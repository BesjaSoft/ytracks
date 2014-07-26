<?php

/**
 *
 * @name Type
 * @abstract A type is the step between Make and Vehicle
 * @author fred
 *
 */
class Type extends BaseModel {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getClassName() {
        return 'Type';
    }

    public function getFullname() {
        return $this->make->name.' '.$this->name;
    }

    public function tableName() {
        return '{{tracks_types}}';
    }

    public function rules() {
        return array(
            array('make_id, name, created', 'required'),
            array('make_id', 'exist', 'attributeName' => 'id', 'className' => 'Make'),
            array('make_id, cartype_id, constructor_id, bodywork_id, motortype_id, engineposition_id, propulsion_id, topspeed, registered, published, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('alias', 'length', 'max' => 100),
            array('description', 'length', 'max' => 255),
            array('chassiscode, production_number', 'length', 'max' => 20),
            array('from, untill, length, width, height, weight, wheelbase, spoorbreedte_voor, spoorbreedte_achter', 'length', 'max' => 10),
            array('checked_out_time, modified, deleted_date', 'safe'),
            // foreign key checks:
            array('make_id', 'exist', 'attributeName' => 'id', 'className' => 'Make'),
            array('cartype_id', 'exist', 'attributeName' => 'id', 'className' => 'Cartype'),
            array('constructor_id', 'exist', 'attributeName' => 'id', 'className' => 'Constructor'),
            array('motortype_id', 'exist', 'attributeName' => 'id', 'className' => 'Motortype'),
            // unique field combination:
            array('make_id+name', 'application.extensions.uniqueMultiColumnValidator'),
            // Search array:
            array('id, make_id, name, alias, description, chassiscode, cartype_id, constructor_id, bodywork_id, from, untill, motortype_id, engineposition_id, propulsion_id, topspeed, length, width, height, weight, wheelbase, spoorbreedte_voor, spoorbreedte_achter, production_number, registered, published, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'make' => array(self::BELONGS_TO, 'Make', 'make_id'),
            'bodywork' => array(self::BELONGS_TO, 'Bodywork', 'bodywork_id'),
            'cartype' => array(self::BELONGS_TO, 'Cartype', 'cartype_id'),
            /*'motortype' => array(self::BELONGS_TO, 'Unit', 'motortype_id'),
            'motorplace' => array(self::BELONGS_TO, 'Unit', 'motorplace_id'),             
            'constructor' => array(self::BELONGS_TO, 'Constructor', 'constructor_id')
            , 'engineposition' => array(self::BELONGS_TO, 'Engineposition', 'engineposition_id')
            , 'propulsion' => array(self::BELONGS_TO, 'Unit', 'propulsion_id')
            , 'result' => array(self::HAS_MANY, 'Result', 'type_id')
            , 'tresult' => array(self::HAS_MANY, 'Tresult', 'type_id')
            
            , 
            , 'scalemodel' => array(self::HAS_MANY, 'Scalemodel', 'type_id')
            , 'tscale' => array(self::HAS_MANY, 'Tscale', 'type_id')
            , 'vehicle' => array(self::HAS_MANY, 'Vehicle', 'type_id')*/
        );
    }

    /**
     * (non-PHPdoc)
     * @see framework/CModel::attributeLabels()
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'make_id' => Yii::t('app', 'Make'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'description' => Yii::t('app', 'Description'),
            'chassiscode' => Yii::t('app', 'Chassiscode'),
            'cartype_id' => Yii::t('app', 'Cartype'),
            'constructor_id' => Yii::t('app', 'Constructor'),
            'bodywork_id' => Yii::t('app', 'Bodywork'),
            'from' => Yii::t('app', 'From'),
            'untill' => Yii::t('app', 'Untill'),
            'motortype_id' => Yii::t('app', 'Motortype'),
            'engineposition_id' => Yii::t('app', 'Engine position'),
            'propulsion_id' => Yii::t('app', 'Propulsion'),
            'topspeed' => Yii::t('app', 'Topspeed'),
            'length' => Yii::t('app', 'Length'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'weight' => Yii::t('app', 'Weight'),
            'wheelbase' => Yii::t('app', 'Wheelbase'),
            'spoorbreedte_voor' => Yii::t('app', 'Spoorbreedte Voor'),
            'spoorbreedte_achter' => Yii::t('app', 'Spoorbreedte Achter'),
            'production_number' => Yii::t('app', 'Production Number'),
            'registered' => Yii::t('app', 'Registered'),
            'published' => Yii::t('app', 'Published'),
            'ordering' => Yii::t('app', 'Ordering'),
            'checked_out' => Yii::t('app', 'Checked Out'),
            'checked_out_time' => Yii::t('app', 'Checked Out Time'),
            'created' => Yii::t('app', 'Created'),
            'modified' => Yii::t('app', 'Modified'),
            'deleted' => Yii::t('app', 'Deleted'),
            'deleted_date' => Yii::t('app', 'Deleted Date'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('make.name', $this->make_id, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('chassiscode', $this->chassiscode, true);
        $criteria->compare('cartype_id', $this->cartype_id);
        $criteria->compare('constructor_id', $this->constructor_id);
        $criteria->compare('bodywork_id', $this->bodywork_id);
        $criteria->compare('from', $this->from, false);
        $criteria->compare('untill', $this->untill, false);
        $criteria->compare('motortype_id', $this->motortype_id);
        $criteria->compare('engineposition_id', $this->engineposition_id);
        $criteria->compare('propulsion_id', $this->propulsion_id);
        $criteria->compare('topspeed', $this->topspeed);
        $criteria->compare('length', $this->length, true);
        $criteria->compare('width', $this->width, true);
        $criteria->compare('height', $this->height, true);
        $criteria->compare('weight', $this->weight, true);
        $criteria->compare('wheelbase', $this->wheelbase, true);
        $criteria->compare('spoorbreedte_voor', $this->spoorbreedte_voor, true);
        $criteria->compare('spoorbreedte_achter', $this->spoorbreedte_achter, true);
        $criteria->compare('production_number', $this->production_number, true);
        $criteria->compare('registered', $this->registered);
        /*
          $criteria->compare('t.published',$this->published);
          $criteria->compare('t.ordering',$this->ordering);
          $criteria->compare('t.checked_out',$this->checked_out);
          $criteria->compare('t.checked_out_time',$this->checked_out_time,true);
          $criteria->compare('created',$this->created,true);
          $criteria->compare('modified',$this->modified,true);
          $criteria->compare('deleted',$this->deleted);
          $criteria->compare('deleted_date',$this->deleted_date,true);
         */
        $criteria->with = array('make');

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function searchTypes() {
        $criteria = new CDbCriteria;

        $criteria->compare('make_id', $this->make_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('chassiscode', $this->chassiscode, true);

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function behaviors() {
        return array(
            'AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'SlugBehavior' => array(
                'class' => 'application.models.behaviours.SlugBehavior',
                'slug_col' => 'alias',
                'title_col' => array(array('make', 'name'), 'name'),
                'overwrite' => false //, 'max_slug_chars' => 125
            )
        );
    }

    /**
     * (non-PHPdoc)
     * @see framework/CActiveRecord::afterSave()
     */
    public function afterSave() {

        // create a directory for the album of the Individual
        $album = $this->getAlbum();
        if (!is_dir($album)) {
            mkdir($album, 0777, true);
        }

        // do some nice stuff in the parent afterSave
        return parent::afterSave();
    }

    public function beforeValidate() {
        if (empty($this->cartype_id)) {
            $this->cartype_id = null;
        }
        if (empty($this->constructor_id)) {
            $this->constructor_id = null;
        }

        return parent::beforeValidate();
    }

    public function convertTypes() {
        echo '***** Start ConvertType *****'."\n";
        $this->printStarttijd();
        $update = new CDbCriteria;
        $criteria = new CDbCriteria;
        $update->condition = 'error <> 0 and deleted=0';
        $condition = 'deleted=0 and error=0'; // and tvehicle is not null and make_id is null';
        Ttype::model()->updateAll(array('error' => '0', 'deleted' => '0'), $update);

        $found = true;
        $cnt = 0;
        $display = 0;

        $criteria->select = 'id';
        $criteria->condition = $condition;
        $count = Ttype::model()->count($criteria);
        echo 'Todo : '.$count."\n";

        $str = strlen((string) $count);
        $limit = str_pad('1', $str - 1, 0);
        $criteria->limit = $limit;
        while ($found) {
            $list = Ttype::model()->findAll($criteria);
            $cnt++;
            //echo 'found:'.count($list).'('.$cnt.')'."\n";
            // no left:
            if (count($list) == 0) {
                $found = false;
            } else {
                foreach ($list as $id) {
                    $ttype = Ttype::model()->findByPk($id->id);
                    $display++;
                    if (($display % $limit) == 0) {
                        echo 'Pk :'.$id->id.', tijd '.date('Y-m-d H:i:s').', done: '.$display.' = '.(sprintf('%01.2f', ($display * 100) / $count))."%\n";
                    }
                    try {
                        // first try to find the type
                        $search = $this->getSlug(trim($ttype->name));
                        $type = Type::model()->find('alias=:alias', array('alias' => $search));
                        if (empty($type->id)) {
                            $tvehicle = TVehicle::model()->find("tvehicle=:name and done=1", array('name' => trim($ttype->name)));
                            if (empty($tvehicle->id)) {
                                $ttype->error = 1;
                                $tvehicle = TVehicle::model()->find("tvehicle=:name and done=0", array('name' => trim($ttype->name)));
                                if (empty($tvehicle->id)) {
                                    $tvehicle->name = trim($ttype->name);
                                    $tvehicle->done = 0;
                                    $tvehicle->save();
                                }
                            } else {
                                if (empty($tvehicle->make_id)) {
                                    $ttype->error = 1;
                                } else {
                                    $ttype->make_id = $tvehicle->make_id;
                                    $ttype->type_id = $tvehicle->type_id;
                                    $ttype->deleted = 1;
                                }
                            }
                        } else {
                            $ttype->make_id = $type->make_id;
                            $ttype->type_id = $type->id;
                            $ttype->deleted = 1;
                        }
                        // then try to find the engine:
                        $search = $this->getSlug(trim($ttype->engine));
                        $engine = Engine::model()->find("alias=:alias", array('alias' => $search));
                        if (empty($engine->id)) {
                            $ttype->error = $ttype->error + 2;
                            $ttype->deleted = 0;
                        } else {
                            $ttype->engine_id = $engine->id;
                        }
                        $ttype->save();
                    } catch (Exception $ex) {
                        echo $ex->getMessage()."\n";
                        print_r($ttype->getErrors()."\n");
                    }
                    unset($ttype);
                }
            }
            unset($list);
        }

        $criteria = new CDbCriteria;
        $criteria->select = 'id';
        $criteria->condition = $update->condition;
        $count = Ttype::model()->count($criteria);
        echo 'Left : '.$count."\n";

        $this->printEindTijd();
        echo '***** Einde ConvertType *****'."\n";
    }

    /**
     * (non-PHPdoc)
     * @see protected/models/BaseModel::getAlbum()
     */
    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                .'/vehicles'
                .'/'.substr($this->getSlug($this->make->name), 0, 1)
                .'/'.$this->getSlug($this->make->name)
                .'/'.$this->getSlug($this->name)
        ); // The directory to display
    }

}
