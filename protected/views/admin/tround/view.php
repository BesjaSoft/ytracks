<?php
$this->breadcrumbs=array(
	'Trounds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tround','url'=>array('index')),
	array('label'=>'Create Tround','url'=>array('create')),
	array('label'=>'Update Tround','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tround','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tround','url'=>array('admin')),
);
?>

<h1>View Tround #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		$this->showContentDetail($model),
		'name',
		$this->showEventDetail($model),
		$this->showProjectDetail($model),
		$this->showCircuitDetail($model),
		'ordering',
		'laps',
		'length',
		'distance_id',
		'start_date',
		'end_date',
		'description',
		'comment',
		'checked_out',
		'checked_out_time',
		'published',
		'manches',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
