<?php

/**
 * This is the model class for table "{{extensions}}".
 *
 * The followings are the available columns in table '{{extensions}}':
 * @property integer $extension_id
 * @property string $name
 * @property string $type
 * @property string $element
 * @property string $folder
 * @property integer $client_id
 * @property integer $enabled
 * @property string $access
 * @property integer $protected
 * @property string $manifest_cache
 * @property string $params
 * @property string $custom_data
 * @property string $system_data
 * @property string $checked_out
 * @property string $checked_out_time
 * @property integer $ordering
 * @property integer $state
 */
class Extension extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{extensions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type, element, folder, client_id, manifest_cache, params, custom_data, system_data', 'required'),
			array('client_id, enabled, protected, ordering, state', 'numerical', 'integerOnly'=>true),
			array('name, element, folder', 'length', 'max'=>100),
			array('type', 'length', 'max'=>20),
			array('access, checked_out', 'length', 'max'=>10),
			array('checked_out_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('extension_id, name, type, element, folder, client_id, enabled, access, protected, manifest_cache, params, custom_data, system_data, checked_out, checked_out_time, ordering, state', 'safe', 'on'=>'search'),
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
			'extension_id' => 'Extension',
			'name' => 'Name',
			'type' => 'Type',
			'element' => 'Element',
			'folder' => 'Folder',
			'client_id' => 'Client',
			'enabled' => 'Enabled',
			'access' => 'Access',
			'protected' => 'Protected',
			'manifest_cache' => 'Manifest Cache',
			'params' => 'Params',
			'custom_data' => 'Custom Data',
			'system_data' => 'System Data',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'ordering' => 'Ordering',
			'state' => 'State',
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

		$criteria->compare('extension_id',$this->extension_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('element',$this->element,true);
		$criteria->compare('folder',$this->folder,true);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('access',$this->access,true);
		$criteria->compare('protected',$this->protected);
		$criteria->compare('manifest_cache',$this->manifest_cache,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('custom_data',$this->custom_data,true);
		$criteria->compare('system_data',$this->system_data,true);
		$criteria->compare('checked_out',$this->checked_out,true);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Extension the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
