<?php
$this->breadcrumbs=array(
	'Scalemodels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Scalemodel','url'=>array('index')),
	array('label'=>'Create Scalemodel','url'=>array('create')),
	array('label'=>'View Scalemodel','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Scalemodel','url'=>array('admin')),
);
?>

<h1>Update Scalemodel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>