<?php

/**
 * This is the model class for table "{{tracks_results}}".
 *
 * The followings are the available columns in table '{{tracks_results}}':
 * @property integer $id
 * @property integer $participant_id
 * @property integer $individual_id
 * @property integer $team_id
 * @property integer $subround_id
 * @property integer $raceclass_id
 * @property string $number
 * @property integer $rank
 * @property string $classification
 * @property string $performance
 * @property integer $laps
 * @property integer $bonus_points
 * @property integer $shared_drive
 * @property integer $make_id
 * @property integer $type_id
 * @property integer $vehicle_id
 * @property integer $engine_id
 * @property integer $tyre_id
 * @property integer $outreason_id
 * @property string $comment
 * @property integer $tresult_id
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Result extends BaseModel
{
    /**
     * Returns the static model of the specified AR class.
     * @return Result the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{tracks_results}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('individual_id, team_id, subround_id, rank, make_id, created', 'required'),
            array('participant_id, individual_id, team_id, subround_id, raceclass_id, rank, laps, bonus_points, shared_drive, make_id, type_id, vehicle_id, engine_id, tyre_id, outreason_id, tresult_id, checked_out, deleted', 'numerical', 'integerOnly'=>true),
            array('number, classification', 'length', 'max'=>10),
            array('performance', 'length', 'max'=>30),
            array('comment, checked_out_time, modified, deleted_date', 'safe'),
            // foreign key checks:
            array('participant_id', 'exist','attributeName' => 'id', 'className' => 'Participant'),
            array('subround_id', 'exist','attributeName' => 'id', 'className' => 'Subround'),
            array('individual_id', 'exist','attributeName' => 'id', 'className' => 'Individual'),
            array('team_id', 'exist','attributeName' => 'id', 'className' => 'Team'),
            array('make_id', 'exist','attributeName' => 'id', 'className' => 'Make'),
            array('type_id', 'exist','attributeName' => 'id', 'className' => 'Type'),
            array('vehicle_id', 'exist','attributeName' => 'id', 'className' => 'Vehicle'),
            array('engine_id', 'exist','attributeName' => 'id', 'className' => 'Engine'),
            array('outreason_id', 'exist','attributeName' => 'id', 'className' => 'Outreason'),
            array('tyre_id', 'exist','attributeName' => 'id', 'className' => 'Tyre'),
            array('raceclass_id', 'exist','attributeName' => 'id', 'className' => 'Raceclass'),
            array('tresult_id', 'exist','attributeName' => 'id', 'className' => 'Tresult'),
            // unique key check:
            array('individual_id+team_id+subround_id+rank', 'uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, participant_id, individual_id, team_id, subround_id, raceclass_id, number, rank, classification, performance, laps, bonus_points, shared_drive, make_id, type_id, vehicle_id, engine_id, tyre_id, outreason_id, comment, tresult_id, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('individual' => array( self::BELONGS_TO, 'Individual', 'individual_id'),
            'team' => array( self::BELONGS_TO, 'Team', 'team_id'),
            'make' => array( self::BELONGS_TO, 'Make', 'make_id'),
            'type' => array( self::BELONGS_TO, 'Type', 'type_id'),
            'vehicle' => array( self::BELONGS_TO, 'Vehicle', 'vehicle_id'),
            'tyre' => array( self::BELONGS_TO, 'Tyre', 'tyre_id'),
            'engine' => array( self::BELONGS_TO, 'Engine', 'engine_id'),
            'subround' => array( self::BELONGS_TO, 'Subround', 'subround_id'),
            'raceclass' => array( self::BELONGS_TO, 'Raceclass', 'raceclass_id'),
            'outreason' => array( self::BELONGS_TO, 'Outreason', 'outreason_id'),
            'tresult' => array( self::BELONGS_TO, 'Tresult', 'tresult_id'),
       );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'participant_id' => 'Participant',
            'individual_id' => 'Individual',
            'team_id' => 'Team',
            'subround_id' => 'Subround',
            'raceclass_id' => 'Raceclass',
            'number' => 'Number',
            'rank' => 'Rank',
            'classification' => 'Classification',
            'performance' => 'Performance',
            'laps' => 'Laps',
            'bonus_points' => 'Bonus Points',
            'shared_drive' => 'Shared Drive',
            'make_id' => 'Make',
            'type_id' => 'Type',
            'vehicle_id' => 'Vehicle',
            'engine_id' => 'Engine',
            'tyre_id' => 'Tyre',
            'outreason_id' => 'Outreason',
            'comment' => 'Comment',
            'tresult_id' => 'Tresult',
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
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('participant_id',$this->participant_id);
        $criteria->compare('individual_id',$this->individual_id);
        $criteria->compare('team_id',$this->team_id);
        $criteria->compare('subround_id',$this->subround_id);
        $criteria->compare('raceclass_id',$this->raceclass_id);
        $criteria->compare('number',$this->number,true);
        $criteria->compare('rank',$this->rank);
        $criteria->compare('classification',$this->classification,true);
        $criteria->compare('performance',$this->performance,true);
        $criteria->compare('laps',$this->laps);
        $criteria->compare('bonus_points',$this->bonus_points);
        $criteria->compare('shared_drive',$this->shared_drive);
        $criteria->compare('make_id',$this->make_id);
        $criteria->compare('type_id',$this->type_id);
        $criteria->compare('vehicle_id',$this->vehicle_id);
        $criteria->compare('engine_id',$this->engine_id);
        $criteria->compare('tyre_id',$this->tyre_id);
        $criteria->compare('outreason_id',$this->outreason_id);
        $criteria->compare('comment',$this->comment,true);
        $criteria->compare('tresult_id',$this->tresult_id);
        $criteria->compare('checked_out',$this->checked_out);
        $criteria->compare('checked_out_time',$this->checked_out_time,true);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('modified',$this->modified,true);
        $criteria->compare('deleted',$this->deleted);
        $criteria->compare('deleted_date',$this->deleted_date,true);

        return new CActiveDataProvider(get_class($this), array('criteria'=>$criteria,));
    }

    public function behaviors()
    {
        return array('AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'CAdvancedArBehavior', array('class' => 'ext.CAdvancedArBehavior')
        );
    }

    public function beforeValidate()
    {
        if (empty($this->participant_id)) $this->participant_id = null;
        if (empty($this->raceclass_id)) $this->raceclass_id = null;
        if (empty($this->tresult_id)) $this->tresult_id = null;
        if (empty($this->vehicle_id)) $this->vehicle_id = null;
        if (empty($this->tyre_id)) $this->tyre_id = null;
        if (empty($this->engine_id)) $this->engine_id = null;

        return parent::beforeValidate();
    }

}