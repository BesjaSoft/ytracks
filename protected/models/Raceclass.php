<?php

/**
 * This is the model class for table "{{tracks_raceclasses}}".
 *
 * The followings are the available columns in table '{{tracks_raceclasses}}':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $alias
 * @property string $description
 * @property integer $ordering
 * @property integer $published
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Raceclass extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Raceclass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getClassName(){
	    return 'Raceclass';
	}

	public function getDisplayField(){
	    return 'code';
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tracks_raceclasses}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code, created', 'required'),
			array('ordering, published, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>40),
			array('code', 'length', 'max'=>10),
			array('alias', 'length', 'max'=>100),
			array('description, modified, deleted_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, code, alias, description, ordering, published, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
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
			'code' => 'Code',
			'alias' => 'Alias',
			'description' => 'Description',
			'ordering' => 'Ordering',
			'published' => 'Published',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('published',$this->published);
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
}