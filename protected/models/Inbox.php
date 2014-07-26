<?php

class Inbox extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'users_messages':
	 * @var integer $id
	 * @var integer $user_id
	 * @var integer $folder_type
	 * @var string $to
	 * @var string $subject
	 * @var string $message
	 * @var integer $status
	 * @var string $created
	 * @var string $modified
	 */
     
     const FOLDER_INBOX = 1;
     const FOLDER_SENT = 2;
     const FOLDER_DRAFT = 3;
     const FOLDER_TRASH = 4;
     
     const STATUS_DELETED = 0;
     const STATUS_NEW = 1;
     const STATUS_READ = 2;
     const STATUS_SENT = 3;
     const STATUS_DRAFT = 4;
     const STATUS_ADMINACCEPTED = 5;

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
		return 'users_messages';
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
			array('sender_id, status_user, status_admin, to_id', 'numerical', 'integerOnly'=>true),
			array('to_email', 'length', 'max'=>50),
			array('subject, message, created, modified', 'safe'),
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
            "user" => array(self::BELONGS_TO, "User", "to_id"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'folder_type' => 'Folder Type',
			'to' => 'To',
			'subject' => 'Subject',
			'message' => 'Message',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}
    
    public function getFolders()
    {
        return array(
            self::FOLDER_INBOX => Yii::t("inbox", "FOLDER_INBOX"),
            self::FOLDER_SENT => Yii::t("inbox", "FOLDER_SENT"),
            self::FOLDER_DRAFT => Yii::t("inbox", "FOLDER_DRAFT"),
            self::FOLDER_TRASH => Yii::t("inbox", "FOLDER_TRASH"),
        );
    }
    
    public function getMessageStatuses()
    {
        return array(
            self::STATUS_NEW => Yii::t("inbox", "STATUS_NEW"),
            self::STATUS_READ => Yii::t("inbox", "STATUS_READ"),
            self::STATUS_DELETED => Yii::t("inbox", "STATUS_DELETED"),
            self::STATUS_SENT => Yii::t("inbox", "STATUS_SENT"),
            self::STATUS_DRAFT => Yii::t("inbox", "STATUS_DRAFT"),
            self::STATUS_ADMINACCEPTED => Yii::t("inbox", "STATUS_ADMINACCEPTED"), 
            
        );
        
    }
}