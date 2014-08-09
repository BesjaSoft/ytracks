<?php

/**
 * This is the model class for table "{{tracks_projects_individuals}}".
 *
 * The followings are the available columns in table '{{tracks_projects_individuals}}':
 * @property integer $id
 * @property integer $individual_id
 * @property integer $project_id
 * @property integer $team_id
 * @property string $number
 * @property integer $initial_points
 * @property integer $raceclass_id
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Participant extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Participant the static model class
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
		return '{{tracks_projects_individuals}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('individual_id, project_id, team_id, created', 'required'),
			array('individual_id, project_id, team_id, initial_points, raceclass_id, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>10),
			array('modified, deleted_date', 'safe'),
			// foreign key checks:
            array( 'individual_id', 'exist', 'attributeName' => 'id', 'className' => 'Individual'),
            array( 'project_id', 'exist', 'attributeName' => 'id', 'className' => 'Project'),
            array( 'team_id', 'exist', 'attributeName' => 'id', 'className' => 'Team'),
            // unique key on foreign keys:
    		array('individual_id+project_id+team_id', 'uniqueMultiColumnValidator'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, individual_id, project_id, team_id, number, initial_points, raceclass_id, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array
		       ( 'individual'  => array(self::BELONGS_TO, 'Individual', 'individual_id' )
		       , 'project'     => array(self::BELONGS_TO, 'Project'   , 'project_id'    )
		       , 'team'        => array(self::BELONGS_TO, 'Team'      , 'team_id'       )
		       , 'raceclass'   => array(self::BELONGS_TO, 'Raceclass' , 'raceclass_id'  )
		       , 'checked_out' => array(self::BELONGS_TO, 'User'      , 'user_id'       )
		       );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'individual_id' => 'Individual',
			'project_id' => 'Project',
			'team_id' => 'Team',
			'number' => 'Number',
			'initial_points' => 'Initial Points',
			'raceclass_id' => 'Raceclass',
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

		$criteria->compare('individual_id',$this->individual_id);

		$criteria->compare('project_id',$this->project_id);

		$criteria->compare('team_id',$this->team_id);

		$criteria->compare('number',$this->number,true);

		$criteria->compare('initial_points',$this->initial_points);

		$criteria->compare('raceclass_id',$this->raceclass_id);

		$criteria->compare('checked_out',$this->checked_out);

		$criteria->compare('checked_out_time',$this->checked_out_time,true);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('modified',$this->modified,true);

		$criteria->compare('deleted',$this->deleted);

		$criteria->compare('deleted_date',$this->deleted_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

    public function behaviors()
    {
        return array
               ( 'AutoTimestampBehavior' => array( 'class' => 'application.components.AutoTimestampBehavior')
               );
    }
}