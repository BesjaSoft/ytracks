<?php
$this->breadcrumbs=array(
	'Tchassises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tchassis','url'=>array('index')),
	array('label'=>'Create Tchassis','url'=>array('create')),
	array('label'=>'View Tchassis','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tchassis','url'=>array('admin')),
);
?>

<h1>Update Tchassis <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>