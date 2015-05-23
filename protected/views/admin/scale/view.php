<?php
$this->breadcrumbs=array(
	'Scales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Scale', 'url'=>array('index')),
	array('label'=>'Create Scale', 'url'=>array('create')),
	array('label'=>'Update Scale', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Scale', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Scale', 'url'=>array('admin')),
);
?>

<h1>View Scale #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'description',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
