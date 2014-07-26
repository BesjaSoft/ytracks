<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $id
 * @property string $menutype
 * @property string $name
 * @property string $alias
 * @property string $link
 * @property string $type
 * @property integer $published
 * @property string $parent
 * @property string $componentid
 * @property integer $sublevel
 * @property integer $ordering
 * @property string $checked_out
 * @property string $checked_out_time
 * @property integer $pollid
 * @property integer $browserNav
 * @property integer $access
 * @property integer $utaccess
 * @property string $params
 * @property string $lft
 * @property string $rgt
 * @property string $home
 */
class Menu extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Menu the static model class
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
			array('params', 'required'),
			array('published, sublevel, ordering, pollid, browserNav, access, utaccess', 'numerical', 'integerOnly'=>true),
			array('menutype', 'length', 'max'=>75),
			array('name, alias', 'length', 'max'=>255),
			array('type', 'length', 'max'=>50),
			array('parent, componentid, checked_out, lft, rgt', 'length', 'max'=>11),
			array('home', 'length', 'max'=>1),
			array('link, checked_out_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menutype, name, alias, link, type, published, parent, componentid, sublevel, ordering, checked_out, checked_out_time, pollid, browserNav, access, utaccess, params, lft, rgt, home', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'alias' => 'Alias',
			'link' => 'Link',
			'type' => 'Type',
			'published' => 'Published',
			'parent' => 'Parent',
			'componentid' => 'Componentid',
			'sublevel' => 'Sublevel',
			'ordering' => 'Ordering',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'pollid' => 'Pollid',
			'browserNav' => 'Browser Nav',
			'access' => 'Access',
			'utaccess' => 'Utaccess',
			'params' => 'Params',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'home' => 'Home',
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
		$criteria->compare('menutype',$this->menutype,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('componentid',$this->componentid,true);
		$criteria->compare('sublevel',$this->sublevel);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('checked_out',$this->checked_out,true);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('pollid',$this->pollid);
		$criteria->compare('browserNav',$this->browserNav);
		$criteria->compare('access',$this->access);
		$criteria->compare('utaccess',$this->utaccess);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('home',$this->home,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}