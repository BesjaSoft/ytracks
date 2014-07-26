<?php
$this->breadcrumbs=array(
	'Makes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Make', 'url'=>array('index')),
	array('label'=>'Create Make', 'url'=>array('create')),
	array('label'=>'Update Make', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Make', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>View Make #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'code',
		'founder_id',
		'logo',
		'ordering',
		'checked_out',
		'checked_out_time',
		'published',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
