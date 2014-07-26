<?php

/**
 * This is the model class for table "{{tracks_tprojects}}".
 *
 * The followings are the available columns in table '{{tracks_tprojects}}':
 * @property integer $id
 * @property integer $content_id
 * @property integer $project_id
 * @property integer $competition_id
 * @property integer $season_id
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Tproject extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tproject the static model class
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
		return '{{tracks_tprojects}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_id, created', 'required'),
			array('content_id, project_id, competition_id, season_id, deleted', 'numerical', 'integerOnly'=>true),
			array('modified, deleted_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content_id, project_id, competition_id, season_id, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content_id' => 'Content',
			'project_id' => 'Project',
			'competition_id' => 'Competition',
			'season_id' => 'Season',
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
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('competition_id',$this->competition_id);
		$criteria->compare('season_id',$this->season_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('deleted_date',$this->deleted_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}