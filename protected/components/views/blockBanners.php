
<?php
if (!empty($banners))
{
	
    foreach($banners as $banner){
			echo '<p class="banner">'.CHtml::link(
                CHtml::image(Yii::app()->baseUrl.substr($banner->image->directory, 1, strlen($banner->image->directory))."/".$banner->image->filename, "", array('border' => 0)),
                array("/banners/redirect", "id" => $banner->id),
                array("target" => "_blank")
            )."</p>";
	}
}


?>