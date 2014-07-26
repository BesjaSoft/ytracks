<?php

class Mailinglist extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tmp_mailinglist':
	 * @var integer $id
	 * @var string $company_name
	 * @var string $email
	 * @var string $homepage
	 * @var integer $tel
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors(){
		return array(
			'AutoTimestampBehavior' => array(
				'class' => 'AutoTimestampBehavior',
			)
		);
	}
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmp_mailinglist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, homepage', 'required'),
			array('tel', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>100),
			array('email', 'email'),
            array('email', 'unique'),
			array('homepage', 'url'),
            array('company_name, tel', 'safe')
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
			'id' => 'Id',
			'company_name' => 'Company Name',
			'email' => 'Email',
			'homepage' => 'Homepage',
			'tel' => 'Tel',
		);
	}
}