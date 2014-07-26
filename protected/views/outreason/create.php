<h2>New Outreason</h2>

<div class="actionBar">
[<?php echo CHtml::link('Outreason List',array('list')); ?>]
[<?php echo CHtml::link('Manage Outreason',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>