<h2>New Tyre</h2>

<div class="actionBar">
[<?php echo CHtml::link('Tyre List',array('list')); ?>]
[<?php echo CHtml::link('Manage Tyre',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>