<h2>New ModuleText</h2>

<div class="actionBar">
[<?php echo CHtml::link('Teised moodulid',array('/containers/admin', "section_id" => $section_id, "module_id" => $module_id)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'module_id' => $module_id,
	'section_id' => $section_id,
	'user_id' => $user_id,
	'update'=>false,
)); ?>