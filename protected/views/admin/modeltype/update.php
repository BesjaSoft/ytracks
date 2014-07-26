<?php
$this->breadcrumbs=array(
	'Modeltypes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Modeltype', 'url'=>array('index')),
	array('label'=>'Create Modeltype', 'url'=>array('create')),
	array('label'=>'View Modeltype', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Modeltype', 'url'=>array('admin')),
);
?>

<h1>Update Modeltype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>