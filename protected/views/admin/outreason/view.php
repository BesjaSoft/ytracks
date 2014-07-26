<?php
$this->breadcrumbs=array(
	'Outreasons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Outreason', 'url'=>array('index')),
	array('label'=>'Create Outreason', 'url'=>array('create')),
	array('label'=>'Update Outreason', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Outreason', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Outreason', 'url'=>array('admin')),
);
?>

<h1>View Outreason #<?php echo $model->id; ?></h1>

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
