<h2><?php echo Yii::t("section", "SECTION_TITLE_NEWSECTION"); ?> </h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("section", "SECTION_BTN_MANAGE"),array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'tree'=>$tree,
	'combo' => $combo,
	'modules' => $modules,
	'update'=>false,
)); ?>