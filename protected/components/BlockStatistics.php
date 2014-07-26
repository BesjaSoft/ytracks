<?php

class BlockStatistics extends CWidget
{
	//public $title = 'Categories';
	public function init()
	{

	}

	public function run()
	{
		$this->renderContent();
	}

	public function getStatistics()
	{
		$statistics = array();
		
		$this->beginCache("stats");
		$statistics["users"] = User::model()->count();
		$statistics["images"] =  Files::model()->count("is_image = 1 AND status = 1");
		
		//Yii::import("application.modules.conferences.models.Conferences");
		//$statistics["conferences"] = Conferences::model()->count();
		$this->endCache();
		
		return $statistics;
	}

	protected function renderContent()
	{
		$this->render('blockStatistics');
	}
}