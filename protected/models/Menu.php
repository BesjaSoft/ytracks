<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $id
 * @property string $menutype
 * @property string $title
 * @property string $alias
 * @property string $note
 * @property string $path
 * @property string $link
 * @property string $type
 * @property integer $published
 * @property string $parent_id
 * @property string $level
 * @property string $component_id
 * @property string $checked_out
 * @property string $checked_out_time
 * @property integer $browserNav
 * @property string $access
 * @property string $img
 * @property string $template_style_id
 * @property string $params
 * @property integer $lft
 * @property integer $rgt
 * @property integer $home
 * @property string $language
 * @property integer $client_id
 */
class Menu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menutype, title, alias, path, link, type, img, params', 'required'),
			array('published, browserNav, lft, rgt, home, client_id', 'numerical', 'integerOnly'=>true),
			array('menutype', 'length', 'max'=>24),
			array('title, alias, note, img', 'length', 'max'=>255),
			array('path, link', 'length', 'max'=>1024),
			array('type', 'length', 'max'=>16),
			array('parent_id, level, component_id, checked_out, access, template_style_id', 'length', 'max'=>10),
			array('language', 'length', 'max'=>7),
			array('checked_out_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menutype, title, alias, note, path, link, type, published, parent_id, level, component_id, checked_out, checked_out_time, browserNav, access, img, template_style_id, params, lft, rgt, home, language, client_id', 'safe', 'on'=>'search'),
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
			'menutype' => 'Menutype',
			'title' => 'Title',
			'alias' => 'Alias',
			'note' => 'Note',
			'path' => 'Path',
			'link' => 'Link',
			'type' => 'Type',
			'published' => 'Published',
			'parent_id' => 'Parent',
			'level' => 'Level',
			'component_id' => 'Component',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'browserNav' => 'Browser Nav',
			'access' => 'Access',
			'img' => 'Img',
			'template_style_id' => 'Template Style',
			'params' => 'Params',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'home' => 'Home',
			'language' => 'Language',
			'client_id' => 'Client',
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
		$criteria->compare('menutype',$this->menutype,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('component_id',$this->component_id,true);
		$criteria->compare('checked_out',$this->checked_out,true);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('browserNav',$this->browserNav);
		$criteria->compare('access',$this->access,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('template_style_id',$this->template_style_id,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('home',$this->home);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('client_id',$this->client_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
