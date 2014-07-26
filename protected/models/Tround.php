<?php

/**
 * This is the model class for table "{{tracks_trounds}}".
 *
 * The followings are the available columns in table '{{tracks_trounds}}':
 * @property integer $id
 * @property string $name
 * @property integer $event_id
 * @property integer $tproject_id
 * @property integer $circuit_id
 * @property integer $ordering
 * @property integer $laps
 * @property string $length
 * @property integer $distance_id
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $comment
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $published
 * @property integer $manches
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Tround extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tround the static model class
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
		return '{{tracks_trounds}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, event_id, tproject_id, ordering, checked_out, checked_out_time, published, created', 'required'),
			array('event_id, tproject_id, circuit_id, ordering, laps, distance_id, checked_out, published, manches, deleted', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('length', 'length', 'max'=>10),
			array('start_date, end_date, description, comment, modified, deleted_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, event_id, tproject_id, circuit_id, ordering, laps, length, distance_id, start_date, end_date, description, comment, checked_out, checked_out_time, published, manches, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'event_id' => 'Event',
			'tproject_id' => 'Tproject',
			'circuit_id' => 'Circuit',
			'ordering' => 'Ordering',
			'laps' => 'Laps',
			'length' => 'Length',
			'distance_id' => 'Distance',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'description' => 'Description',
			'comment' => 'Comment',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'published' => 'Published',
			'manches' => 'Manches',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('tproject_id',$this->tproject_id);
		$criteria->compare('circuit_id',$this->circuit_id);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('laps',$this->laps);
		$criteria->compare('length',$this->length,true);
		$criteria->compare('distance_id',$this->distance_id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('checked_out',$this->checked_out);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('manches',$this->manches);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('deleted_date',$this->deleted_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}