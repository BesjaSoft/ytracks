<?php

class Articles extends CActiveRecord
{
	
	const STATUS_PENDING = 0;
	const STATUS_APPROVED = 1;
	const STATUS_ARCHIVED = 2;
	
	
	/**
	 * The followings are the available columns in table 'articles':
	 * @var integer $id
	 * @var integer $user_id
	 * @var integer $category_id
	 * @var integer $image_id
	 * @var string $title
	 * @var string $body
	 * @var integer $status
	 * @var string $created
	 * @var string $modified
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
		return 'module_articles';
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
			array('title','length','max'=>250),
			array('title, body, status', 'required'),
			array('user_id, category_id, image_id, status', 'numerical', 'integerOnly'=>true),
		);
	}

	public function scopes()
    {
        return array(
            'search'=>array(
            	'condition'=>'status = 1',
                'order'=>'created DESC',
                'limit'=>10,
            ),
        );
    }
    
    public function search($keyword = "")
	{
	    $this->getDbCriteria()->mergeWith(array(
	    	'condition' => "title LIKE '%".$keyword."%'",
	        'order'=>'created DESC'
	    ));
	    return $this;
	}
	
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			"category" => array(self::BELONGS_TO, 'Categories', 'category_id'),
			"user" => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id'=> Yii::t("articles", "ARTICLE_USER"),
			'category_id'=>Yii::t("articles", "ARTICLE_CATEGORY"),
			'image_id'=>Yii::t("articles", "ARTICLE_IMAGE"),
			'title'=>Yii::t("articles", "ARTICLE_TITLE"),
			'body'=>Yii::t("articles", "ARTICLE_BODY"),
			'status'=>Yii::t("general", "TXT_STATUS"),
			'created'=>Yii::t("general", "TXT_CREATED"),
			'modified'=>Yii::t("general", "TXT_MODIFIED"),
		);
	}
	
	
	/**
	 * @return array comment status names indexed by status IDs
	 */
	public function getStatusOptions()
	{
		return array(
			self::STATUS_PENDING => Yii::t("general", "STATUS_PENDING"),
			self::STATUS_APPROVED => Yii::t("general", "STATUS_APPROVED"),
			self::STATUS_ARCHIVED => Yii::t("general", "STATUS_ARCHIVED")
		);
	}
	
	
	public function getArticles($top = 10)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "status = 1";
		$criteria->limit = $top;
		$criteria->order = "created ASC";
		
		return $this->findAll($criteria);
	}
	
}