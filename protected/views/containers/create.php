<h2><?php echo Yii::t("container", "TITLE_ADDNEWCONTAINER") ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("container", "BTN_ALLCONTAINERSINSECTION"),array('admin', 'section_id' => $section_id,)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'containers'=>$containers,
	'section_id' => $section_id,
	'update'=>false,
)); ?>