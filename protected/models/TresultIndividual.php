<?php

class TresultIndividual extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{tracks_tresults_individuals}}';
	}

	public function rules()
	{
		return array(
			array('result_id, individual_id', 'required'),
			array('result_id, individual_id, deleted', 'numerical', 'integerOnly'=>true),
			array('classification', 'length', 'max'=>3),
			array('remarks', 'safe'),
			array('id, result_id, individual_id, classification, remarks, deleted', 'safe', 'on'=>'search'),
			// foreign key checks:
			array('result_id', 'exist', 'attributeName' => 'id','className'=>'Tresult'),
			array('individual_id', 'exist', 'attributeName' => 'id','className'=>'Individual'),
			// unique key
 			array('result_id+individual_id', 'uniqueMultiColumnValidator', 'caseSensitive' => true)
		);
	}

    public function relations()
    {
        return array(
            'tresult' => array(self::BELONGS_TO, 'Tresult', 'result_id'),
            'individual' => array(self::BELONGS_TO, 'Individual', 'individual_id'),
        );
    }

	public function behaviors()
	{
		return array('CAdvancedArBehavior',
				array('class' => 'ext.CAdvancedArBehavior')
				);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'result_id' => Yii::t('app', 'Result'),
			'individual_id' => Yii::t('app', 'Individual'),
			'classification' => Yii::t('app', 'Classification'),
			'remarks' => Yii::t('app', 'Remarks'),
			'deleted' => Yii::t('app', 'Deleted'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('result_id',$this->result_id);

		$criteria->compare('individual_id',$this->individual_id);

		$criteria->compare('classification',$this->classification,true);

		$criteria->compare('remarks',$this->remarks,true);

		$criteria->compare('deleted',$this->deleted);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
