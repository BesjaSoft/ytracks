<?php

/**
 * This is the model class for table "{{categories}}".
 *
 * The followings are the available columns in table '{{categories}}':
 * @property integer $id
 * @property string $asset_id
 * @property string $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property string $level
 * @property string $path
 * @property string $extension
 * @property string $title
 * @property string $alias
 * @property string $note
 * @property string $description
 * @property integer $published
 * @property string $checked_out
 * @property string $checked_out_time
 * @property string $access
 * @property string $params
 * @property string $metadesc
 * @property string $metakey
 * @property string $metadata
 * @property string $created_user_id
 * @property string $created_time
 * @property string $modified_user_id
 * @property string $modified_time
 * @property string $hits
 * @property string $language
 * @property string $version
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{categories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, params, metadesc, metakey, metadata, language', 'required'),
			array('lft, rgt, published', 'numerical', 'integerOnly'=>true),
			array('asset_id, parent_id, level, access, created_user_id, modified_user_id, hits, version', 'length', 'max'=>10),
			array('path, title, alias, note', 'length', 'max'=>255),
			array('extension', 'length', 'max'=>50),
			array('checked_out', 'length', 'max'=>11),
			array('metadesc, metakey', 'length', 'max'=>1024),
			array('metadata', 'length', 'max'=>2048),
			array('language', 'length', 'max'=>7),
			array('checked_out_time, created_time, modified_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, asset_id, parent_id, lft, rgt, level, path, extension, title, alias, note, description, published, checked_out, checked_out_time, access, params, metadesc, metakey, metadata, created_user_id, created_time, modified_user_id, modified_time, hits, language, version', 'safe', 'on'=>'search'),
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
			'asset_id' => 'Asset',
			'parent_id' => 'Parent',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
			'path' => 'Path',
			'extension' => 'Extension',
			'title' => 'Title',
			'alias' => 'Alias',
			'note' => 'Note',
			'description' => 'Description',
			'published' => 'Published',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'access' => 'Access',
			'params' => 'Params',
			'metadesc' => 'Metadesc',
			'metakey' => 'Metakey',
			'metadata' => 'Metadata',
			'created_user_id' => 'Created User',
			'created_time' => 'Created Time',
			'modified_user_id' => 'Modified User',
			'modified_time' => 'Modified Time',
			'hits' => 'Hits',
			'language' => 'Language',
			'version' => 'Version',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('asset_id',$this->asset_id,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('checked_out',$this->checked_out,true);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('access',$this->access,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('metadesc',$this->metadesc,true);
		$criteria->compare('metakey',$this->metakey,true);
		$criteria->compare('metadata',$this->metadata,true);
		$criteria->compare('created_user_id',$this->created_user_id,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('modified_user_id',$this->modified_user_id,true);
		$criteria->compare('modified_time',$this->modified_time,true);
		$criteria->compare('hits',$this->hits,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('version',$this->version,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
