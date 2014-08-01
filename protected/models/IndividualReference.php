<?php

/**
 * This is the model class for table "{{tracks_individuals_references}}".
 *
 * The followings are the available columns in table '{{tracks_individuals_references}}':
 * @property integer $id
 * @property integer $individual_id
 * @property string $internal_reference
 * @property integer $source_id
 * @property string $source_reference
 * @property string $full_name
 * @property string $first_name
 * @property string $last_name
 */
class IndividualReference extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return IndividualReference the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
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
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_references}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('individual_id, source_id', 'numerical', 'integerOnly' => true),
            array('internal_reference', 'length', 'max' => 50),
            array('source_reference', 'length', 'max' => 20),
            array('full_name', 'length', 'max' => 100),
            array('first_name', 'length', 'max' => 50),
            array('last_name', 'length', 'max' => 75),
            // referential checks:
            array('source_id', 'exist', 'attributeName' => 'id', 'className' => 'Source'),
            array('individual_id', 'exist', 'attributeName' => 'id', 'className' => 'Individual'),
            // unique key constraint:
            array('individual_id+source_id', 'application.extensions.uniqueMultiColumnValidator'),
            array('source_id+source_reference', 'application.extensions.uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, individual_id, internal_reference, source_id, source_reference, full_name, first_name, last_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'individual' => array(self::BELONGS_TO, 'Individual', 'individual_id'),
            'source' => array(self::BELONGS_TO, 'Source', 'source_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'individual_id'      => 'Individual',
            'internal_reference' => 'Internal Reference',
            'source_id'          => 'Source',
            'source_reference'   => 'Source Reference',
            'full_name'          => 'Full Name',
            'first_name'         => 'First Name',
            'last_name'          => 'Last Name',
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
        $criteria->compare('individual_id', $this->individual_id);
        $criteria->compare('internal_reference', $this->internal_reference, true);
        $criteria->compare('source_id', $this->source_id);
        $criteria->compare('source_reference', $this->source_reference, true);
        $criteria->compare('full_name', $this->full_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}