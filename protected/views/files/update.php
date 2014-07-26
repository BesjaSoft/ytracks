<h2>Update files <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('files List',array('list')); ?>]
[<?php echo CHtml::link('New files',array('create')); ?>]
[<?php echo CHtml::link('Manage files',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>