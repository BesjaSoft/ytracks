<h2><?php echo Yii::t("modules", "TITLE_ADDNEWMODULE"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("modules", "BTN_MANAGEMODULES"),array("containers/admin", "section_id" => $section_id)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'modules'=>$modules,
	'container_id' => $container_id,
	'section_id' => $section_id,
	'update'=>false,
)); ?>