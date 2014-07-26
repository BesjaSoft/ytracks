<?php

class BlockCategories extends CWidget
{
	//public $title = 'Categories';
	public $module = "gallery";
    public $viewFile = "blockCategories";
	 
	public function init()
	{

	}

	public function run()
	{
		$this->renderContent();
	}

	public function getTreeCategories()
	{
		return Categories::model()->getCategories($this->module);
	}

	protected function renderContent()
	{
        if (file_exists(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"))
        {
           $this->renderFile(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"); 
        }else{
            $this->render($this->viewFile);
        }
	}
}