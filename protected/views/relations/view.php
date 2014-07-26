<?php
$this->breadcrumbs=array(
	'Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List relations', 'url'=>array('index')),
	array('label'=>'Create relations', 'url'=>array('create')),
	array('label'=>'Update relations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete relations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage relations', 'url'=>array('admin')),
);
?>

<h1>View relations #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'module_id',
		'object_id',
	),
)); ?>
