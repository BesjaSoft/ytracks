<?php
$this->breadcrumbs=array(
	'Assets'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Asset','url'=>array('index')),
	array('label'=>'Create Asset','url'=>array('create')),
	array('label'=>'Update Asset','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Asset','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asset','url'=>array('admin')),
);
?>

<h1>View Asset #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'lft',
		'rgt',
		'level',
		'name',
		'title',
		'rules',
	),
)); ?>
