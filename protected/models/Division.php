<?php

/**
 * This is the model class for table "{{tracks_projects_raceclasses}}".
 *
 * The followings are the available columns in table '{{tracks_projects_raceclasses}}':
 * @property integer $id
 * @property integer $project_id
 * @property integer $raceclass_id
 * @property string $description
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Division extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return Division the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_projects_raceclasses}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('project_id, raceclass_id, ordering, checked_out, checked_out_time, created', 'required'),
            array('project_id, raceclass_id, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('description, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, project_id, raceclass_id, description, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'project_id' => 'Project',
            'raceclass_id' => 'Raceclass',
            'description' => 'Description',
            'ordering' => 'Ordering',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
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
        $criteria->compare('project_id', $this->project_id);
        $criteria->compare('raceclass_id', $this->raceclass_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
