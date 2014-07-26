<h2><?php echo Yii::t("articles", "ARTICLE_TITLE_DETAILS")." (id #".$model->id.")"; ?></h2>


<div class="actionBar">
[<?php echo CHtml::link(Yii::t("articles", "BTN_MYARTICLES"),array('list')); ?>]
[<?php echo CHtml::link(Yii::t("articles", "BTN_ADDNEW"), array('create')); ?>]
[<?php echo CHtml::link(Yii::t("articles", "BTN_UPDATE"),array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton(Yii::t("articles", "BTN_DELETE"),array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
<?php 

if (Yii::app()->user->isAdmin){
	echo "[".CHtml::link(Yii::t("articles", "BTN_MANAGE"), array('admin'))."]";
}

?>
</div>


<div id="article_details_info">
	<?php echo Yii::t("articles", "ARTICLE_CATEGORY").": ".CHtml::encode($model->category->title); ?><br />
    <?php echo Yii::t("general", "TXT_CREATED").": ".Time::nice($model->created, "d.m.Y (H:i)"); ?><br />
	<?php echo Yii::t("general", "TXT_MODIFIED").": ".Time::nice($model->modified, "d.m.Y (H:i)"); ?><br />
	<?php
    Yii::t("general", "TXT_STATUS").": "; 
	$status = Articles::getStatusOptions();
	echo $status[$model->status]; ?>
</div>

<div id="article_details_title" ><?php echo CHtml::encode($model->title); ?></div>
<div id="article_details_body"><?php echo $model->body; ?></div>