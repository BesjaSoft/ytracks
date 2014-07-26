<?php

class BlockTopArticles extends CWidget
{
	//public $title = 'Categories';
	public function init()
	{

	}

	public function run()
	{
		$this->renderContent();
	}

	public function getArticles($top = 10)
	{
		
		return Articles::model()->getArticles($top);
	}

	protected function renderContent()
	{
		$this->render('blockTopArticles');
	}
}