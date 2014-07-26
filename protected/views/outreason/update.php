<h2>Update Outreason <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Outreason List',array('list')); ?>]
[<?php echo CHtml::link('New Outreason',array('create')); ?>]
[<?php echo CHtml::link('Manage Outreason',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>