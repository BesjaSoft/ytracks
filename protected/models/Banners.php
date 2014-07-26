<?php

class Banners extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'banners':
	 * @var integer $id
	 * @var string $type
	 * @var integer $place
	 * @var integer $user_id
	 * @var integer $file_id
	 * @var string $url
	 * @var integer $date_showstart
	 * @var integer $date_showend
	 * @var integer $status
	 * @var string $created
	 * @var string $modified
	 */


    const TYPE_46860 = "468_60"; // "468x60", 
	const TYPE_12060 = "120_60"; // "120x60",
	const TYPE_23074 = "230_74"; // "230x74 Alumine pealehel",
	const TYPE_186212 = "186_212"; // "186x212 Parempoolne",
	const TYPE_66074 = "660_74"; // "660x74 allpool"
    
    
   	const STATUS_PENDING = 0;
	const STATUS_APPROVED = 1;
	const STATUS_ARCHIVED = 2;
    
    public $date_start;
    public $date_end;
    
    
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
		return 'banners';
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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, url', 'required'),
			array('user_id, image_id,  status', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>10),
            array('showalltime, date_showstart, date_showend,', 'safe'),
            
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
            'image' => array(self::BELONGS_TO, "Files", "image_id"),
            'user' =>  array(self::BELONGS_TO, "User", "user_id"),
            'stats' => array(self::HAS_MANY, "BannersStats", "banner_id"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'type' => Yii::t("banners", "BANNER_TYPE"),'place' => Yii::t("banners", "BANNER_PLACE"),
			'user_id' => Yii::t("banners", "BANNER_USER"),
			'image_id' => Yii::t("banners", "BANNER_FILE"),
			'url' => Yii::t("banners", "BANNER_URL"),
			'showalltime' => Yii::t("banners", "BANNER_SHOWALLTIME"), 
			'date_showstart' => Yii::t("banners", "BANNER_SHOWSTART"),
			'date_showend' => Yii::t("banners", "BANNER_SHOWENDTYPE"),
			'status' => Yii::t("general", "TXT_STATUS"),
			'created' => Yii::t("general", "TXT_CREATED"),
			'modified' => Yii::t("general", "TXT_MODIFIED"),
		);
	}
    
    
    public function getBannerTypes()
	{
		return array(
			self::TYPE_46860 =>  Yii::t("banners", "TYPE_46860"),
			self::TYPE_12060 => Yii::t("banners", "TYPE_12060"),
			self::TYPE_23074 => Yii::t("banners", "TYPE_23074"),
            self::TYPE_186212 => Yii::t("banners", "TYPE_186212"),
            self::TYPE_66074  => Yii::t("banners", "TYPE_66074")
		);
	}
    
    /**
	 * @return array comment status names indexed by status IDs
	 */
	public function getStatusOptions()
	{
		return array(
			self::STATUS_PENDING =>  Yii::t("general", "STATUS_PENDING"),
			self::STATUS_APPROVED => Yii::t("general", "STATUS_APPROVED"),
			self::STATUS_ARCHIVED => Yii::t("general", "STATUS_ARCHIVED")
		);
	}
    
    
    public  function beforeSave()
    {
        $this->date_showstart = strtotime($this->date_showstart);
        $this->date_showend = strtotime($this->date_showend);
        
        return true;
    }
}