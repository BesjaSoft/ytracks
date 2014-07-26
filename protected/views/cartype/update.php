<h2>Update Cartype <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Cartype List',array('list')); ?>]
[<?php echo CHtml::link('New Cartype',array('create')); ?>]
[<?php echo CHtml::link('Manage Cartype',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>