<?php

/**
 * This is the model class for table "{{tracks_teams}}".
 *
 * The followings are the available columns in table '{{tracks_teams}}':
 * @property integer $id
 * @property integer $club_id
 * @property string $name
 * @property string $alias
 * @property string $short_name
 * @property integer $published
 * @property string $acronym
 * @property integer $constructor_id
 * @property string $picture
 * @property string $picture_small
 * @property string $country_code
 * @property string $description
 * @property integer $admin_id
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Team extends BaseModel
{

    public static function getClassName(){
        return 'Team';
    }
	/**
	 * Returns the static model of the specified AR class.
	 * @return Team the static model class
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
		return '{{tracks_teams}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, created', 'required'),
			array('club_id, published, constructor_id, admin_id, ordering, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			array('name, alias, picture, picture_small', 'length', 'max'=>100),
			array('short_name', 'length', 'max'=>20),
			array('acronym', 'length', 'max'=>6),
			array('country_code', 'length', 'max'=>3),
			array('modified, deleted_date', 'safe'),
			// unique name:
            array('name', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, club_id, name, alias, short_name, published, acronym, constructor_id, picture, picture_small, country_code, description, admin_id, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array
		       ( 'result'      => array(self::HAS_MANY  , 'Result'     , 'team_id'       )
		       , 'tresult'     => array(self::HAS_MANY  , 'Tresult'    , 'team_id'       )
		       , 'participant' => array(self::HAS_MANY  , 'Participant', 'team_id'       )
		       , 'constructor' => array(self::BELONGS_TO, 'Make'       , 'constructor_id')
		       );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'club_id' => 'Club',
			'name' => 'Name',
			'alias' => 'Alias',
			'short_name' => 'Short Name',
			'published' => 'Published',
			'acronym' => 'Acronym',
			'constructor_id' => 'Constructor',
			'picture' => 'Picture',
			'picture_small' => 'Picture Small',
			'country_code' => 'Country Code',
			'description' => 'Description',
			'admin_id' => 'Admin',
			'ordering' => 'Ordering',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'created' => 'Created',
			'modified' => 'Modified',
			'deleted' => 'Deleted',
			'deleted_date' => 'Deleted Date',
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

		$criteria->compare('club_id',$this->club_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('alias',$this->alias,true);

		$criteria->compare('short_name',$this->short_name,true);

		$criteria->compare('published',$this->published);

		$criteria->compare('acronym',$this->acronym,true);

		$criteria->compare('constructor_id',$this->constructor_id);

		$criteria->compare('picture',$this->picture,true);

		$criteria->compare('picture_small',$this->picture_small,true);

		$criteria->compare('country_code',$this->country_code,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('admin_id',$this->admin_id);

		$criteria->compare('ordering',$this->ordering);

		$criteria->compare('checked_out',$this->checked_out);

		$criteria->compare('checked_out_time',$this->checked_out_time,true);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('modified',$this->modified,true);

		$criteria->compare('deleted',$this->deleted);

		$criteria->compare('deleted_date',$this->deleted_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}