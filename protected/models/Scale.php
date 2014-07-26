<?php

/**
 * This is the model class for table "{{tracks_scales}}".
 *
 * The followings are the available columns in table '{{tracks_scales}}':
 * @property integer $id
 * @property string $code
 * @property string $description
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Scale extends Unit {

    public function getDisplayField() {
        return 'code';
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Scale the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_scales}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('code, description, created', 'required'),
            array('deleted', 'numerical', 'integerOnly' => true),
            array('code', 'length', 'max' => 10),
            array('modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, code, description, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    public function behaviors() {
        return array('AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'));
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'code' => 'Code',
            'description' => 'Description',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
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
        $criteria->compare('code', $this->code, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

}