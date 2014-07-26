<?php

class SearchCategoriesForm extends CFormModel
{
	public $keyword;
    public $module;

	public function rules() 
	{
		return array(
            //array('keyword', 'required'),
            array('keyword, module', 'safe')
		);
	}
	
    
    public function attributeLabels()
	{
		return array(
            'keyword' => Yii::t('category', "KEYWORD"),
            'module' => Yii::t('category', "MODULE"),
		);
	}
}