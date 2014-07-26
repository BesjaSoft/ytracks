<?php

/**
 * This is the model class for table "{{tracks_constructors}}".
 *
 * The followings are the available columns in table '{{tracks_constructors}}':
 * @property integer $id
 * @property string $description
 * @property string $created
 * @property string $modified
 */
class Constructor extends BaseModel {

    public static $displayField = 'description';

    /**
     * Returns the static model of the specified AR class.
     * @return Constructor the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public static function getDisplayField($class = __CLASS__) {
        return parent::getDisplayField($class);
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_constructors}}';
    }

    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('description, created, modified', 'required'),
            array('description', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, description, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('types' => array(self::HAS_MANY, 'Type', 'constructor_id'));
    }



    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'description' => 'Description',
            'created' => 'Created',
            'modified' => 'Modified',
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
        $criteria->compare('description', $this->description, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
