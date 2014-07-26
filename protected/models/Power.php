<?php

/**
 * This is the model class for table "{{tracks_units}}".
 *
 * The followings are the available columns in table '{{tracks_units}}':
 * @property integer $id
 * @property string $domain
 * @property string $code
 * @property string $description
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $delete_date
 */
class Power extends Unit
{
    /**
     * Returns the static model of the specified AR class.
     * @return Distance the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('domain, code, description, checked_out_time, created, modified', 'required'),
			array('published, ordering, checked_out, deleted', 'numerical', 'integerOnly'=>true),
			array('domain, code', 'length', 'max'=>10),
			array('description' , 'length', 'max'=>255),
			array('delete_date' , 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, domain, code, description, published, ordering, checked_out, checked_out_time, created, modified, deleted, delete_date', 'safe', 'on'=>'search'),
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
		       ( 'engine' => array( self::HAS_MANY, 'Engine' , 'power_id' )
		       );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'domain' => 'Domain',
			'code' => 'Code',
			'description' => 'Description',
			'published' => 'Published',
			'ordering' => 'Ordering',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'created' => 'Created',
			'modified' => 'Modified',
			'deleted' => 'Deleted',
			'delete_date' => 'Delete Date',
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

		$criteria->compare('domain',"PWR",true);

		$criteria->compare('code',$this->code,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('published',$this->published);

		$criteria->compare('ordering',$this->ordering);

		$criteria->compare('checked_out',$this->checked_out);

		$criteria->compare('checked_out_time',$this->checked_out_time,true);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('modified',$this->modified,true);

		$criteria->compare('deleted',$this->deleted);

		$criteria->compare('delete_date',$this->delete_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

    public function scopes(){
        return array
               ( 'list'     => array( 'condition' => 'published=1 and deleted=0 and domain="PWR"'
                                    , 'order'     => 'domain,code'
                                    , 'select'    => 'id,code'
                                    )
               );
    }
}