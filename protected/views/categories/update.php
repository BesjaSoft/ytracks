<h2><?php echo Yii::t("category", "TITLE_UPDATECATEGORY")." (#".$model->id.")"; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("category", "BTN_ADDNEW"),array('create')); ?>]
[<?php echo CHtml::link(Yii::t("category", "BTN_MANAGECATEGORIES"),array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>