<?php
$this->breadcrumbs=array(
	'Bodyworks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bodywork','url'=>array('index')),
	array('label'=>'Create Bodywork','url'=>array('create')),
	array('label'=>'Update Bodywork','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Bodywork','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bodywork','url'=>array('admin')),
);
?>

<h1>View Bodywork #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'domain',
		'code',
		'description',
		'published',
		'alias',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'delete_date',
	),
)); ?>
