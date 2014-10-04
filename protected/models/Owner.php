<?php

/**
 * This is the model class for table "{{tracks_owners}}".
 *
 * The followings are the available columns in table '{{tracks_owners}}':
 * @property integer $id
 * @property integer $vehicle_id
 * @property integer $individual_id
 * @property integer $team_id
 * @property string $from
 * @property string $untill
 * @property string $description
 * @property integer $current
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Owner extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Owner the static model class
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
		return '{{tracks_owners}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_id, individual_id, published', 'required'),
			//array('vehicle_id, individual_id, team_id, published, ordering, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			//array('from, untill, checked_out_time, deleted_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vehicle_id, individual_id, team_id, from, untill, description, current, published, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
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
		       ( 'individual' => array(self::BELONGS_TO, 'Individual', 'individual_id')
		       , 'vehicle'    => array(self::BELONGS_TO, 'Vehicle'   , 'vehicle_id'   )
		       , 'team'       => array(self::BELONGS_TO, 'Team'      , 'team_id'      )
		       );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vehicle_id' => 'Vehicle',
			'individual_id' => 'Individual',
			'team_id' => 'Team',
			'from' => 'From',
			'untill' => 'Untill',
			'description' => 'Description',
			'current' => 'Current',
			'published' => 'Published',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('vehicle_id',$this->vehicle_id);

		$criteria->compare('individual_id',$this->individual_id);

		$criteria->compare('team_id',$this->team_id);

		$criteria->compare('from',$this->from,true);

		$criteria->compare('untill',$this->untill,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('current',$this->current);

		$criteria->compare('published',$this->published);

		$criteria->compare('ordering',$this->ordering);

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
               ( 'AutoTimestampBehavior' => array( 'class' => 'AutoTimestampBehavior')
               );
    }
}