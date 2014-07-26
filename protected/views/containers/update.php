<h2><?php echo Yii::t("container", "TITLE_UPDATECONTAINER")." (".$container->id.")"; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("container", "BTN_ADDCONTAINERTOMENU"), array('create', 'section_id' => $container->section_id)); ?>]
[<?php echo CHtml::link(Yii::t("container", "BTN_ALLCONTAINERINMENU"),array('admin', 'section_id' => $container->section_id)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'containers'=>$container,
    'section_id' => $container->section_id,
	'update'=>true,
)); ?>