<?php
$this->breadcrumbs=array(
	'Extensions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Extension','url'=>array('index')),
	array('label'=>'Create Extension','url'=>array('create')),
	array('label'=>'Update Extension','url'=>array('update','id'=>$model->extension_id)),
	array('label'=>'Delete Extension','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->extension_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Extension','url'=>array('admin')),
);
?>

<h1>View Extension #<?php echo $model->extension_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'extension_id',
		'name',
		'type',
		'element',
		'folder',
		'client_id',
		'enabled',
		'access',
		'protected',
		'manifest_cache',
		'params',
		'custom_data',
		'system_data',
		'checked_out',
		'checked_out_time',
		'ordering',
		'state',
	),
)); ?>
