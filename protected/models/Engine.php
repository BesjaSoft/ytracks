<?php

/**
 * This is the model class for table "{{tracks_engines}}".
 */
class Engine extends BaseModel {

    public static $displayField = 'enginename';

    /**
     * Returns the static model of the specified AR class.
     * @return Engine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_engines}}';
    }

    /**
     *
     */
    protected function beforeSave() {

        if (empty($this->power) && $this->power == 0) {
            $this->power = null;
            $this->power_id = null;
            $this->power_revs = null;
        }

        return parent::beforeSave();
    }

    public function getFullname() {
        return $this->make->name . ' ' . $this->name;
    }

    public function findList($conditions = '', $params = array()) {
        $criteria = new CDbCriteria;
        $criteria->select = 'id,make.name,t.name';
        $criteria->condition = 't.deleted=0';
        $criteria->order = 'make.name,t.name';
        $data = $this->with('make')->findAll($criteria);

        return CHtml::listData($data, 'id', 'fullname');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('make_id, created', 'required'),
            array('make_id, parent_id, tuner_id, enginetype_id, cams, valves_cylinder, capacity_id, power_id, power_revs, torque_id, torque_revs, induction, ignition_id, fuelsystem_id, published, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('name, alias', 'length', 'max' => 100),
            array('description', 'length', 'max' => 255),
            array('code', 'length', 'max' => 20),
            array('compression, bore, stroke, capacity, power, torque', 'length', 'max' => 9),
            array('checked_out_time, deleted_date', 'safe'),
            // foreign keys:
            array('make_id', 'exist', 'attributeName' => 'id', 'className' => 'Make'),
            array('tuner_id', 'exist', 'attributeName' => 'id', 'className' => 'Tuner'),
            array('enginetype_id', 'exist', 'attributeName' => 'id', 'className' => 'EngineType'),
            array('parent_id', 'exist', 'attributeName' => 'id', 'className' => 'Engine'),
            // multicolumn unique validator
            array('make_id+name', 'uniqueMultiColumnValidator', 'caseSensitive' => true),
            //array('make_id+code','uniqueMultiColumnValidator'),
            //// The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, make_id, name, alias, description, code, parent_id, tuner_id, enginetype_id, compression, cams, valves_cylinder, bore, stroke, capacity, capacity_id, power, power_id, power_revs, torque, torque_id, torque_revs, induction, ignition_id, fuelsystem_id, published, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
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
            'tuner' => array(self::BELONGS_TO, 'Tuner', 'tuner_id'),
            'parent' => array(self::BELONGS_TO, 'Engine', 'parent_id'),
            'enginetype' => array(self::BELONGS_TO, 'Enginetype', 'enginetype_id'),
            'capacityUnit' => array(self::BELONGS_TO, 'Volume', 'capacity_id'),
            'powerUnit' => array(self::BELONGS_TO, 'Power', 'power_id'),
            'torqueUnit' => array(self::BELONGS_TO, 'Torque', 'torque_id')
        );
    }

    public function behaviors() {
        return array('AutoTimestampBehavior' => array('class' => 'AutoTimestampBehavior'),
            'SlugBehavior' => array('class' => 'SlugBehavior',
                'slug_col' => 'alias',
                'title_col' => array(array('make', 'name'), 'name'),
                'overwrite' => true,
            //, 'max_slug_chars' => 125
            ),
            'CAdvancedArBehavior', array('class' => 'CAdvancedArBehavior')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'make_id' => 'Make',
            'name' => 'Name',
            'alias' => 'Alias',
            'description' => 'Description',
            'code' => 'Code',
            'parent_id' => 'Parent',
            'tuner_id' => 'Tuner',
            'enginetype_id' => 'Enginetype',
            'compression' => 'Compression',
            'cams' => 'Cams',
            'valves_cylinder' => 'Valves Cylinder',
            'bore' => 'Bore',
            'stroke' => 'Stroke',
            'capacity' => 'Capacity',
            'capacity_id' => 'Capacity',
            'power' => 'Power',
            'power_id' => 'Power',
            'power_revs' => 'Power Revs',
            'torque' => 'Torque',
            'torque_id' => 'Torque',
            'torque_revs' => 'Torque Revs',
            'induction' => 'Induction',
            'ignition_id' => 'Ignition',
            'fuelsystem_id' => 'Fuelsystem',
            'published' => 'Published',
            'ordering' => 'Ordering',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Active',
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
        $criteria->compare('make.name', $this->make_id, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('tuner_id', $this->tuner_id);
        $criteria->compare('enginetype_id', $this->enginetype_id);
        $criteria->compare('compression', $this->compression, true);
        $criteria->compare('cams', $this->cams);
        $criteria->compare('valves_cylinder', $this->valves_cylinder);
        $criteria->compare('bore', $this->bore, true);
        $criteria->compare('stroke', $this->stroke, true);
        $criteria->compare('capacity', $this->capacity, true);
        $criteria->compare('capacity_id', $this->capacity_id);
        $criteria->compare('power', $this->power, true);
        $criteria->compare('power_id', $this->power_id);
        $criteria->compare('power_revs', $this->power_revs);
        $criteria->compare('torque', $this->torque, true);
        $criteria->compare('torque_id', $this->torque_id);
        $criteria->compare('torque_revs', $this->torque_revs);
        $criteria->compare('induction', $this->induction);
        $criteria->compare('ignition_id', $this->ignition_id);
        $criteria->compare('fuelsystem_id', $this->fuelsystem_id);
        $criteria->compare('published', $this->published);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        $criteria->with = array('make');

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    public function searchEngines() {
        $criteria = new CDbCriteria;

        $criteria->compare('make_id', $this->make_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('code', $this->code, true);

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

}
