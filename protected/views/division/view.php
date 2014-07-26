<?php
$this->breadcrumbs=array(
	'Divisions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Division', 'url'=>array('index')),
	array('label'=>'Create Division', 'url'=>array('create')),
	array('label'=>'Update Division', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Division', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Division', 'url'=>array('admin')),
);
?>

<h1>View Division #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_id',
		'raceclass_id',
		'description',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
