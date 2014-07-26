<h2>Update ModuleText <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Teissed moodulid',array('/containers/admin', "section_id" => $section_id, "module_id" => $module_id)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'module_id' => $module_id,
	'section_id' => $section_id,
	'user_id' => $user_id,
	'update'=>true,
)); ?>