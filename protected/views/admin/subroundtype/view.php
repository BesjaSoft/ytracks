<?php
$this->breadcrumbs=array(
	'Subroundtypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Subroundtype', 'url'=>array('index')),
	array('label'=>'Create Subroundtype', 'url'=>array('create')),
	array('label'=>'Update Subroundtype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subroundtype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subroundtype', 'url'=>array('admin')),
);
?>

<h1>View Subroundtype #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'note',
		'points',
		'countpoints',
		'manche',
		'fastest_lap',
		'pole_position',
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
