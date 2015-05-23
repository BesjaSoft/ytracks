<?php
$this->breadcrumbs=array(
	'Driver Scalemodels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DriverScalemodel', 'url'=>array('index')),
	array('label'=>'Create DriverScalemodel', 'url'=>array('create')),
	array('label'=>'Update DriverScalemodel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DriverScalemodel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DriverScalemodel', 'url'=>array('admin')),
);
?>

<h1>View DriverScalemodel #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'individual_id',
		'scalemodel_id',
		'ordering',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
