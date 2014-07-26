<h2><?php echo Yii::t("articles", "ARTICLE_TITLE_UPDATE")." (#".$model->id.")"; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("articles", "BTN_MYARTICLES"),array('list')); ?>]
[<?php echo CHtml::link(Yii::t("articles", "BTN_ADDNEW"),array('create')); ?>]
<?php echo Yii::app()->user->isAdmin ? "[".CHtml::link(Yii::t("articles", "BTN_MANAGE"),array('admin'))."]" : ""; ?>
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>