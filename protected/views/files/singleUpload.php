<h2>New files</h2>

<div class="actionBar">
[<?php echo CHtml::link('files List',array('list')); ?>]
[<?php echo CHtml::link('Manage files',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_single_upload.php', array(
	'model'=>$model,
	'update'=>false,
)); ?>