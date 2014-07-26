<?php

class ModuleText extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'ModuleText':
	 * @var integer $id
	 * @var integer $module_id
	 * @var integer $user_id
	 * @var string $title
	 * @var string $content
	 * @var string $lang
	 * @var string $created
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'module_text';
	}
	
	public function behaviors(){
		return array(
			'AutoTimestampBehavior' => array(
				'class' => 'AutoTimestampBehavior',
			)
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('lang','length','max'=>2),
			array('title, content', 'required'),
			array('module_id, user_id', 'numerical', 'integerOnly'=>true),
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
			'id'=>'Id',
			'module_id'=>'Module',
			'user_id'=>'User',
			'title'=>'Title',
			'content'=>'Content',
			'lang'=>'Lang',
			'created'=>'Created',
		);
	}
}