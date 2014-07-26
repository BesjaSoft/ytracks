<?php

class SearchArticlesForm extends CFormModel
{
	public $keyword;
    public $category_id;

	public function rules() 
	{
		return array(
			//array('keyword', 'required'),
            array('keyword, category_id', 'safe')
		);
	}
	

}