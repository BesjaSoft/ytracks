<h2><?php echo Yii::t("modules", "TITLE_UPDATEMODULE")." (".$modules->id.")"; ?></h2>


<div class="actionBar">
<!--
[<?php echo CHtml::link('New Modules',array('create')); ?>]
[<?php echo CHtml::link('Manage Modules',array('admin')); ?>]
-->
</div>

<?php echo $this->renderPartial('_form', array(
	'modules'=>$modules,
	'section_id' => $section_id,
	'update'=>true,
)); ?>