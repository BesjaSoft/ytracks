<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Unit','url'=>array('index')),
	array('label'=>'Create Unit','url'=>array('create')),
	array('label'=>'Update Unit','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Unit','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Unit','url'=>array('admin')),
);
?>

<h1>View Unit #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'domain',
		'code',
		'description',
		'published',
		'alias',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'delete_date',
	),
)); ?>
