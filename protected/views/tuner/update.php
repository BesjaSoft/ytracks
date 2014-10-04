<?php
$this->breadcrumbs=array(
	'Tuners'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tuner','url'=>array('index')),
	array('label'=>'Create Tuner','url'=>array('create')),
	array('label'=>'View Tuner','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tuner','url'=>array('admin')),
);
?>

<h1>Update Tuner <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>