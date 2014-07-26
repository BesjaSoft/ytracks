<?php
$this->breadcrumbs=array(
	'Enginetypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Enginetype', 'url'=>array('index')),
	array('label'=>'Create Enginetype', 'url'=>array('create')),
	array('label'=>'Update Enginetype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Enginetype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Enginetype', 'url'=>array('admin')),
);
?>

<h1>View Enginetype #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'description',
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
