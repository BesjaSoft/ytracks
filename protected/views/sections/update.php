<h2><?php echo Yii::t("section", "SECTION_TITLE_UPDATE"); ?> (# <?php echo $tree->id; ?>)</h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("section", "SECTION_BTN_MANAGE"),array('admin')); ?>]
[<?php echo CHtml::link(Yii::t("section", "SECTION_BTN_ADDNEW"),array('create')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'tree'=>$tree,
	'update'=>true,
	'combo' => $combo,
	'modules' => $modules
)); ?>