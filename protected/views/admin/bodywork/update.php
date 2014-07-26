<?php
$this->breadcrumbs=array(
	'Bodyworks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bodywork','url'=>array('index')),
	array('label'=>'Create Bodywork','url'=>array('create')),
	array('label'=>'View Bodywork','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Bodywork','url'=>array('admin')),
);
?>

<h1>Update Bodywork <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>