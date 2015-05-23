<?php

/**
 * This is the model class for table "{{tracks_individual_references}}".
 *
 * The followings are the available columns in table '{{tracks_individual_references}}':
 * @property integer $id
 * @property integer $individual_id
 * @property integer $source_id
 * @property string $source_reference
 * @property string $full_name
 * @property string $first_name
 * @property string $last_name
 * @property string $createdon
 * @property string $modifiedon
 * @property integer $deleted
 * @property string $deletedon
 */
class IndividualReference extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tracks_individual_references}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('individual_id, source_id, source_reference, createdon', 'required'),
			array('individual_id, source_id, deleted', 'numerical', 'integerOnly'=>true),
			array('source_reference', 'length', 'max'=>50),
			array('full_name', 'length', 'max'=>250),
			array('first_name', 'length', 'max'=>100),
			array('last_name', 'length', 'max'=>150),
			array('modifiedon, deletedon', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, individual_id, source_id, source_reference, full_name, first_name, last_name, createdon, modifiedon, deleted, deletedon', 'safe', 'on'=>'search'),
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
			'individual_id' => 'Individual',
			'source_id' => 'Source',
			'source_reference' => 'Source Reference',
			'full_name' => 'Full Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'createdon' => 'Createdon',
			'modifiedon' => 'Modifiedon',
			'deleted' => 'Deleted',
			'deletedon' => 'Deletedon',
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
		$criteria->compare('individual_id',$this->individual_id);
		$criteria->compare('source_id',$this->source_id);
		$criteria->compare('source_reference',$this->source_reference,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('modifiedon',$this->modifiedon,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('deletedon',$this->deletedon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IndividualReference the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
