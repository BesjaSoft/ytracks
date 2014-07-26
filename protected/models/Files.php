<?php

class Files extends CActiveRecord
{
	
	// STATUSES
	const STATUS_PENDING=0;
	const STATUS_APPROVED=1;
	const STATUS_ARCHIVED=2;
    const STATUS_ANONYMOUS=9;
	
	public $myfile;
	public $image;
	
	public $categories;
	public $tags;
    
    public $afterSave = array();
    
    public $prev_id;
    public $next_id;
	
	/**
	 * The followings are the available columns in table 'files':
	 * @var integer $id
	 * @var string $location
	 * @var integer $user_id
	 * @var integer $parent_id
	 * @var string $directory
	 * @var string $filename
	 * @var integer $filesize
	 * @var string $mimetype
	 * @var string $version
	 * @var string $title
	 * @var string $description
	 * @var integer $status
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
		return 'files';
	}
	
	public function behaviors(){
		return array(
			'AutoTimestampBehavior' => array(
				'class' => 'AutoTimestampBehavior',
			)
		);
	}
	
	/**
	 * before validate
	 */
//	protected function beforeValidate()
//	{
//		parent::beforeValidate("a");
//		
//		if($this->myfile !== null && !$this->myfile->hasError)
//		{
//			$this->filename = md5(time().$this->fail->name).'.'.$this->fail->extensionName;
//			$this->filesize = $this->fail->size;
//			$this->mimetype = $this->fail->type;
//			//$this->directory = $this->getImageDir();
//			$this->user_id = Yii::app()->user->id;
//			//$this->faili_laiendus = $this->fail->extensionName;
//		}
//		
//		return true;
//	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			//array('location','length','max'=>150),
			//array('title', 'required'),
			//array('user_id, filesize, status', 'numerical', 'integerOnly'=>true),
			//array('image', 'file', 'types'=>'gif,jpg,jpeg,png', 'maxSize'=>2097152, 'tooLarge'=>'Maximum file size is 2MB.'),
			//array('fail','file','allowEmpty'=>true),
			//array('kuulutuse_id, faili_suurus, faili_tuup', 'numerical', 'integerOnly'=>true),
			//array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
            array('myfile', 'file')
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
			//'kuulutus'=>array(self::BELONGS_TO, 'EttevotteKuulutus', 'object_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'fileCategories2' => array(self::MANY_MANY, "Categories", "files_categories(file_id, category_id)"),
			'fileCategories' => array(self::MANY_MANY, "Categories", "files_categories(file_id, category_id)",
                'select' => 'fileCategories.id, fileCategories.title',
				'together' => true,
				'condition' => 'fileCategories.id = :category_id'),
			'tagFilter' => array(self::MANY_MANY, 'Tag', 'files_tags(file_id, tag_id)',
				'together'=>true,
				'joinType'=>'INNER JOIN',
				'condition'=>'??.name=:tag'),
		);
	}
	
	public function scopes()
    {
        return array(
            'searchImages'=>array(
            	'condition'=>'files.status = 1 AND files.is_image = 1 AND files.object_name = "gallery"',
                'order'=>'created DESC',
                'limit'=>9,
            ),
            'searchByCategory' => array(
				'condition'=>'files.status = 1 AND files.is_image = 1 AND 1 = 1',
				'join' => "files_categories",
                'order'=>'created DESC',
                'limit'=>9,
			)
        );
    }
    
    public function searchByCategory($category_id = 0)
	{
	    $this->getDbCriteria()->mergeWith(array(
	    	'condition' => "files_categories.category_id = ".$category_id,
	        'order'=>'files.created DESC',
	        'limit'=>9,
	    ));
	    return $this;
	}
    
    public function searchImages($keyword = "")
	{
	    $this->getDbCriteria()->mergeWith(array(
	    	'condition' => "files.title LIKE '%".$keyword."%'",
	        'order'=>'files.created DESC'
	    ));
	    return $this;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kaubamark' => Yii::t('kuulutused','Ettevõtte kaubamärk'),
			'pilt' => Yii::t('kuulutused','Lae ülesse kuni 4 pilti ettevõttest'),
			'videoklipp' => Yii::t('kuulutused','Lae ülesse kuni 5 min videoklipp'),
			'user_id' => Yii::t("file", "FILE_AUTHOR"),
			'directory' => Yii::t("file", "FILE_DIRECTORY"),
			'filename' => Yii::t("file", "FILE_NAME"),
			'filesize' => Yii::t("file", "FILE_SIZE"),
			'mimetype' => Yii::t("file", "FILE_MIME"),
			'title' => Yii::t("file", "FILE_TITLE"),
			'description' => Yii::t("file", "FILE_DESCRIPTION"),
			'status' => Yii::t("general", "TXT_STATUS"),
			'created' => Yii::t("general", "TXT_CREATED"),
            'tags' => Yii::t("file", "FILE_TAGS"),
            'categories' => Yii::t("file", "FILE_CATEGORIES"),
            
            
		);
	}
	
	protected function beforeDelete()
	{
		if(parent::beforeDelete())
		{
			@unlink($this->directory.$this->filename);
			return true;
		}
		else
			return false;
	}
	
	public function getImageDir()
	{
		$dirs = array(
			self::TUUP_FAIL=>'images/',
			self::TUUP_KAUBAMARK=>'images/kaubamark/',
			self::TUUP_PILT=>'images/pilt/',
			self::TUUP_VIDEOKLIPP=>'images/videoklipp/',
		);
		
		if(isset($dirs[$this->title]))
			return $dirs[$this->title];
		else
			return $dirs[self::TUUP_FAIL];
	}
	
	public function getTitleText($title=null)
	{
		if($title===null)
			$title = $this->title;
		
		switch($title)
		{
			case self::TUUP_FAIL: $text = Yii::t('kuulutused','Fail'); break;
			case self::TUUP_KAUBAMARK: $text = Yii::t('kuulutused','Kaubamärk'); break;
			case self::TUUP_PILT: $text = Yii::t('kuulutused','Pilt'); break;
			case self::TUUP_VIDEOKLIPP: $text = Yii::t('kuulutused','Videoklipp'); break;
			default: $text='';
		}
		
		return $text;
	}
	
	/**
	 * @return array comment status names indexed by status IDs
	 */
	public function getStatusOptions()
	{
		return array(
			self::STATUS_PENDING=> Yii::t("general", "STATUS_PENDING"),
			self::STATUS_APPROVED=>Yii::t("general", "STATUS_APPROVED"),
			self::STATUS_ARCHIVED=>Yii::t("general", "STATUS_ARCHIVED"),
            self::STATUS_ANONYMOUS=>Yii::t("general", "STATUS_ANONYMOUS")
		);
	}
	
	public function findRecentFiles($type = "gallery", $is_image = 1, $limit = 9)
	{
		
		$criteria=array(
			'condition'=>'is_image = '.$is_image.' AND object_name = "'.$type.'" AND status='.self::STATUS_APPROVED,
			'order'=>'created DESC',
			'limit'=>$limit,
		);
		return $this->findAll($criteria);
	}
    
	/**
	 * @return array tags
	 */
	public function getTagArray()
	{
	   $tags = array_unique(preg_split('/\s*,\s*/',trim($this->tags),-1,PREG_SPLIT_NO_EMPTY));
       //print_r ($tags);
       sort($tags, SORT_STRING);
       //echo "aftrer sort <br />";
       //print_r ($tags);
		return $tags;
	}
	
	/**
	 * @return array categories
	 */
	public function getCategoriesArray()
	{
		return array_unique($this->categories);
	}
	
		/**
	 * Postprocessing after the record is saved
	 */
	protected function afterSave()
	{
		if(!$this->isNewRecord)
		{
			$this->dbConnection->createCommand('DELETE FROM files_tags WHERE file_id='.$this->id)->execute();
			$this->dbConnection->createCommand('DELETE FROM files_categories WHERE file_id='.$this->id)->execute();
		}
		
		// SAVE TAGS
		$tags = $this->getTagArray();
		if (is_array($tags) && !empty($tags))
		{
			foreach($this->getTagArray() as $name)
			{
				if(($tag=Tag::model()->findByAttributes(array('name'=>$name)))===null)
				{
					$tag=new Tag(array('name'=>$name));
					$tag->save();
				}
				$this->dbConnection->createCommand("INSERT INTO files_tags (file_id, tag_id) VALUES ({$this->id},{$tag->id})")->execute();
			}
		}
		// SAVE CATEGORIES
		if (is_array($this->categories) && !empty($this->categories))
		{
			foreach($this->categories as $cat_id)
			{
				$this->dbConnection->createCommand("INSERT INTO files_categories (file_id, category_id) VALUES ({$this->id},{$cat_id})")->execute();
			}
		}
		
	}
}