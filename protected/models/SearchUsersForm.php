<?php

class SearchUsersForm extends CFormModel
{
	public $keyword;
    public $category_id;
    public $isikukood;

	public function rules() 
	{
		return array(
			//array('keyword', 'required'),
            array('keyword, isikukood, category_id', 'safe')
		);
	}
	

}