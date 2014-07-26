<h2>New Cartype</h2>

<div class="actionBar">
[<?php echo CHtml::link('Cartype List',array('list')); ?>]
[<?php echo CHtml::link('Manage Cartype',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>