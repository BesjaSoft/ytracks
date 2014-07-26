<h1 id="article_details_title" ><?php echo CHtml::encode($model->title); ?></h1>


<div id="article_details_info">
	<?php echo Yii::t("articles", "ARTICLE_CATEGORY").": ".CHtml::encode($model->category->title); ?><br />
	<?php echo Yii::t("general", "TXT_CREATED").": ".Time::nice($model->created, "d.m.Y (H:i)"); ?><br />
	<?php echo Yii::t("general", "TXT_MODIFIED").": ".Time::nice($model->modified, "d.m.Y (H:i)"); ?><br />
	<?php 
    Yii::t("general", "TXT_STATUS").": ";
	$status = Articles::getStatusOptions();
	echo $status[$model->status]; ?>
</div>


<div id="article_details_body"><?php echo $model->body; ?></div>