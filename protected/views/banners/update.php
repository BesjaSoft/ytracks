<h2><?php echo Yii::t("banners", "TITLE_UPDATEBANNER")." (#".$model->id.")"; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("banners", "BTN_ADDNEW"),array('create')); ?>]
[<?php echo CHtml::link(Yii::t("banners", "BTN_MANAGEBANNERS"),array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>