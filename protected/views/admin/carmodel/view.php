<?php
$this->breadcrumbs=array(
	'Carmodels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Carmodel', 'url'=>array('index')),
	array('label'=>'Create Carmodel', 'url'=>array('create')),
	array('label'=>'Update Carmodel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Carmodel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Carmodel', 'url'=>array('admin')),
);
?>

<h1>View Carmodel #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'make_id',
		'type_id',
		'description',
		'reference',
		'year',
		'range_id',
		'scale_id',
		'modeltype_id',
		'material_id',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
