
<?php
if (!empty($banner))
{
	switch ($banner->type){
		case "660_74":
			echo '<p class="banner">'.CHtml::link(
                CHtml::image(Yii::app()->baseUrl.substr($banner->image->directory, 1, strlen($banner->image->directory))."/".$banner->image->filename, "", array('border' => 0)),
                array("/banners/redirect", "id" => $banner->id),
                array("target" => "_blank")
            )."</p>";
			break;
            
        case "230_74":
			echo '<p class="banner">'.CHtml::link(
                CHtml::image(Yii::app()->baseUrl.substr($banner->image->directory, 1, strlen($banner->image->directory))."/".$banner->image->filename, "", array('border' => 0)),
                array("/banners/redirect", "id" => $banner->id),
                array("target" => "_blank")
            )."</p>";
			break;
	}
}


?>