<?php
$this->breadcrumbs=array(
	'Tuners'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tuner','url'=>array('index')),
	array('label'=>'Create Tuner','url'=>array('create')),
	array('label'=>'Update Tuner','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tuner','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tuner','url'=>array('admin')),
);
?>

<h1>View Tuner #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'published',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
