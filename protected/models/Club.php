<?php

/**
 * This is the model class for table "{{tracks_clubs}}".
 *
 * The followings are the available columns in table '{{tracks_clubs}}':
 * @property integer $id
 * @property string $full_name
 * @property string $alias
 * @property string $picture
 * @property string $picture_small
 * @property string $address
 * @property string $postcode
 * @property string $city
 * @property string $state
 * @property string $country_code
 * @property string $description
 * @property integer $admin_id
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Club extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Club the static model class
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
		return '{{tracks_clubs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name, admin_id, checked_out, checked_out_time, created', 'required'),
			array('admin_id, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			array('full_name', 'length', 'max'=>40),
			array('alias, picture, picture_small', 'length', 'max'=>100),
			array('postcode', 'length', 'max'=>10),
			array('city', 'length', 'max'=>50),
			array('state', 'length', 'max'=>20),
			array('country_code', 'length', 'max'=>3),
			array('address, description, modified, deleted_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, full_name, alias, picture, picture_small, address, postcode, city, state, country_code, description, admin_id, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
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
			'full_name' => 'Full Name',
			'alias' => 'Alias',
			'picture' => 'Picture',
			'picture_small' => 'Picture Small',
			'address' => 'Address',
			'postcode' => 'Postcode',
			'city' => 'City',
			'state' => 'State',
			'country_code' => 'Country Code',
			'description' => 'Description',
			'admin_id' => 'Admin',
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

		$criteria->compare('full_name',$this->full_name,true);

		$criteria->compare('alias',$this->alias,true);

		$criteria->compare('picture',$this->picture,true);

		$criteria->compare('picture_small',$this->picture_small,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('postcode',$this->postcode,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('state',$this->state,true);

		$criteria->compare('country_code',$this->country_code,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('admin_id',$this->admin_id);

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