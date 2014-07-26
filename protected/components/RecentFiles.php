<?php

class RecentFiles extends Portlet
{
	public $title = 'Recent Files';

	public function getRecentFiles($type, $is_image, $limit)
	{
		return Files::model()->findRecentFiles($type, $is_image, $limit);
	}

	protected function renderContent()
	{
		$this->render('recentFiles');
	}
}