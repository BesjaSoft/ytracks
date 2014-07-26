<h2>Update Tyre <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Tyre List',array('list')); ?>]
[<?php echo CHtml::link('New Tyre',array('create')); ?>]
[<?php echo CHtml::link('Manage Tyre',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>