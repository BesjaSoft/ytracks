<?php

class AdminMenu extends CWidget
{
	public $visible = true;
	
	public function init()
	{
		if(!$this->visible){
			return;
		}
		if(isset($_POST['command']) && $_POST['command']==='logout')
		{
			Yii::app()->user->logout();
			$this->controller->redirect(Yii::app()->homeUrl);
		}
		//$this->title=CHtml::encode(Yii::app()->user->name);
		parent::init();
	}

	public function run()
	{
		if(!$this->visible){
			return;
		}
		$this->renderContent();
	}

	protected function renderContent()
	{
		$this->render('adminMenu');
	}
}