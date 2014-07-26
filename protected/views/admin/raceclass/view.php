<?php
$this->breadcrumbs=array(
	'Raceclasses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Raceclass', 'url'=>array('index')),
	array('label'=>'Create Raceclass', 'url'=>array('create')),
	array('label'=>'Update Raceclass', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Raceclass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Raceclass', 'url'=>array('admin')),
);
?>

<h1>View Raceclass #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'alias',
		'description',
		'ordering',
		'published',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
