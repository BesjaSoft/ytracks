<?php

/**
 * This is the model class for table "{{tracks_scheduled_jobs}}".
 *
 * The followings are the available columns in table '{{tracks_scheduled_jobs}}':
 * @property string $id
 * @property string $params
 * @property string $output
 * @property string $job_id
 * @property string $scheduled_time
 * @property string $started
 * @property string $completed
 * @property integer $active
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class ScheduledJob extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_scheduled_jobs}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('job_id', 'required'),
            array('active, deleted', 'numerical', 'integerOnly' => true),
            array('job_id', 'length', 'max' => 10),
            array('params, output, scheduled_time, started, completed, created, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, params, output, job_id, scheduled_time, started, completed, active, created, modified, deleted, deleted_date',
                'safe', 'on' => 'search'),
        );
    }

    public function scopes() {
        return array(
            'active' => array(
                'condition' => 'active=1 AND completed IS NULL',
            ),
            'current' => array(
                'condition' => 'scheduled_time < now()',
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'job' => array(self::BELONGS_TO, 'Job', 'job_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'params' => 'Params',
            'output' => 'Output',
            'job_id' => 'Job',
            'scheduled_time' => 'Scheduled Time',
            'started' => 'Started',
            'completed' => 'Completed',
            'active' => 'Active',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('params', $this->params, true);
        $criteria->compare('output', $this->output, true);
        $criteria->compare('job_id', $this->job_id, true);
        $criteria->compare('scheduled_time', $this->scheduled_time, true);
        $criteria->compare('started', $this->started, true);
        $criteria->compare('completed', $this->completed, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ScheduledJob the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
