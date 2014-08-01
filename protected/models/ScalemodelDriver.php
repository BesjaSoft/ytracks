<?php

/**
 * This is the model class for table "{{tracks_drivers_scalemodels}}".
 *
 * The followings are the available columns in table '{{tracks_drivers_scalemodels}}':
 * @property integer $id
 * @property integer $individual_id
 * @property integer $scalemodel_id
 * @property integer $ordering
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class ScalemodelDriver extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return ScalemodelDriver the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_drivers_scalemodels}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('individual_id, scalemodel_id, created', 'required'),
            array('individual_id, scalemodel_id, ordering, deleted', 'numerical', 'integerOnly' => true),
            array('modified, deleted_date', 'safe'),
            // foreign key checks:
            array('individual_id', 'exist', 'attributeName' => 'id', 'className' => 'Individual'),
            array('scalemodel_id', 'exist', 'attributeName' => 'id', 'className' => 'Scalemodel'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, individual_id, scalemodel_id, ordering, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
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
            'scalemodel' => array(self::BELONGS_TO, 'Scalemodel', 'scalemodel_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'individual_id' => 'Individual',
            'scalemodel_id' => 'Scalemodel',
            'ordering' => 'Ordering',
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
        $criteria->compare('individual_id', $this->individual_id);
        $criteria->compare('scalemodel_id', $this->scalemodel_id);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
