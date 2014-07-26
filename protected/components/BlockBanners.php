<?php

class BlockBanners extends CWidget
{

	public function init()
	{
		
	}
	
	public function run()
	{
		$this->renderContent();
		
	} 

	protected function renderContent()
	{
        $today = mktime(0,0,0, date("m"), date("d"), date("Y"));
		$criteria = new CDbCriteria;
        $criteria->condition = "status = 1";
        //$criteria->conditions = "date_showstart >= ".$today." AND date_showend <= ".$today;
        
        $banners = Banners::model()->findAll($criteria);
        
        // UPDATE VIEWS 
       // if (!empty($banner))
//        {
//        	$stat = Yii::app()->db->createCommand('SELECT * FROM banners_stats WHERE banner_id = '.$banner->id.' AND date = "'.date("Y-m-d").'"')->queryRow();
//            if (!empty($stat)){
//        		$views = $stat["views"] + 1;
//                Yii::app()->db->createCommand("UPDATE banners_stats SET views = ".$views." WHERE id = ".$stat["id"])->execute();
//            }
//        }
        
        //print_r ($banners);
        
		$this->render('blockBanners', array('banners' => $banners));
	}
}