<?php
$this->breadcrumbs=array(
	'Seasons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Season','url'=>array('index')),
	array('label'=>'Create Season','url'=>array('create')),
	array('label'=>'Update Season','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Season','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Season','url'=>array('admin')),
);
?>

<h1>View Season #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
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
