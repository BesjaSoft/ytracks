<?php

/**
 * This is the model class for table "{{tracks_subroundtypes}}".
 *
 * The followings are the available columns in table '{{tracks_subroundtypes}}':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $note
 * @property string $points
 * @property integer $countpoints
 * @property integer $manche
 * @property integer $fastest_lap
 * @property integer $pole_position
 * @property string $description
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Subroundtype extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subroundtype the static model class
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
		return '{{tracks_subroundtypes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('countpoints, manche, fastest_lap, pole_position, ordering, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>40),
			array('alias, note', 'length', 'max'=>100),
			array('points', 'length', 'max'=>250),
			array('description, modified, deleted_date', 'safe'),
			// unique name:
		    array('name', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, note, points, countpoints, manche, fastest_lap, pole_position, description, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'alias' => 'Alias',
			'note' => 'Note',
			'points' => 'Points Attribution',
			'countpoints' => 'Countpoints',
			'manche' => 'Manche',
			'fastest_lap' => 'Fastest Lap',
			'pole_position' => 'Pole Position',
			'description' => 'Description',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('alias',$this->alias,true);

		$criteria->compare('note',$this->note,true);

		$criteria->compare('points',$this->points,true);

		$criteria->compare('countpoints',$this->countpoints);

		$criteria->compare('manche',$this->manche);

		$criteria->compare('fastest_lap',$this->fastest_lap);

		$criteria->compare('pole_position',$this->pole_position);

		$criteria->compare('description',$this->description,true);

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

    public function scopes(){
        return array
               ( 'list'     => array( 'order'     => $this->getDisplayField()
                                    , 'select'    => 'id,'.$this->getDisplayField()
                                    )
               , 'active'   => array( 'condition' => 'deleted=0'                  )
               , 'recently' => array( 'order'     => 'create_time DESC','limit'=>5)
               );
    }
}