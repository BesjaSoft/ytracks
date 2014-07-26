<?php

/**
 * This is the model class for table "{{tracks_Models}}".
 *
 * The followings are the available columns in table '{{tracks_Models}}':
 * @property integer $id
 * @property integer $make_id
 * @property integer $type_id
 * @property string $description
 * @property string $reference
 * @property integer $year
 * @property integer $range_id
 * @property integer $scale_id
 * @property integer $modeltype_id
 * @property integer $material_id
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Model extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Model the static model class
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
		return '{{tracks_models}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('make_id, type_id', 'required'),
			array('make_id, type_id, year, range_id, scale_id, modeltype_id, material_id, deleted', 'numerical', 'integerOnly'=>true),
			array('description, reference', 'length', 'max'=>255),
			array('created, modified, deleted_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, make_id, type_id, description, reference, year, range_id, scale_id, modeltype_id, material_id, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
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
			'make_id' => 'Make',
			'type_id' => 'Type',
			'description' => 'Description',
			'reference' => 'Reference',
			'year' => 'Year',
			'range_id' => 'Range',
			'scale_id' => 'Scale',
			'modeltype_id' => 'Modeltype',
			'material_id' => 'Material',
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

		$criteria->compare('make_id',$this->make_id);

		$criteria->compare('type_id',$this->type_id);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('reference',$this->reference,true);

		$criteria->compare('year',$this->year);

		$criteria->compare('range_id',$this->range_id);

		$criteria->compare('scale_id',$this->scale_id);

		$criteria->compare('modeltype_id',$this->modeltype_id);

		$criteria->compare('material_id',$this->material_id);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('modified',$this->modified,true);

		$criteria->compare('deleted',$this->deleted);

		$criteria->compare('deleted_date',$this->deleted_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}