<?php

class UserProfile extends CActiveRecord
{
	const BANK_SEB = 1;
    const BANK_SWED = 2;
    const BANK_SAMPO = 3;
    const BANK_NORDEA = 4;

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
		return 'users_profiles';
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
			array('address_city','length','max'=>100),
			array('address_street','length','max'=>150),
            array('address_street','required'),
			array('homepage','length','max'=>150),
			//array('address_city, address_street', 'required'),
			array('country_id, address_postcode', 'numerical', 'integerOnly'=>true),
            array('birthday', 'match', 'pattern' => '/[0-9]{2}.[0-9]{2}.[0-9]{4}/'),
            array('address_state, phone, birthday, sex, bank_name, bank_account', 'safe'),
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
			'avatar_id' => Yii::t("user", "AVATAR"),
			'country_id' => Yii::t("user", "COUNTRY"),
			'address_city' => Yii::t("user", "CITY"),
			'address_street' => Yii::t("user", "STREET"),
			'address_postcode' => Yii::t("user", "POSTCODE"),
			'address_state' => Yii::t("user", "STATE"),
			'sex' => Yii::t("user", "SEX"),
			'birthday' => Yii::t("user", "BIRTHDAY"),
            'phone' => Yii::t("user", "PHONE"),
			'homepage' => Yii::t("user", "HOMEPAGE"),
			'created' => Yii::t("general", "TXT_CREATED"),
			'modified' => Yii::t("general", "TXT_MODIFIED"),
            'bank_name' => Yii::t("user", "BANKNAME"),
            'bank_account' => Yii::t("user", "BANKACCOUNT"),
		);
	}
    
    public function getBanks(){
        return array(
            self::BANK_SEB => Yii::t("user", "BANKSEB"),
            self::BANK_SWED => Yii::t("user", "BANKSWED"),
            self::BANK_SAMPO => Yii::t("user", "BANKSAMPO"),
            self::BANK_NORDEA => Yii::t("user", "BANKNORDEA"),
        );
    } 
    
    public function beforeSave()
    {
        $this->birthday = Time::nice($this->birthday, "Y-m-d");
        
        if (substr($this->homepage, 0, 7) != "http://"){
            $this->homepage = "http://".$this->homepage;
        }
			 
        return true;
    }
}