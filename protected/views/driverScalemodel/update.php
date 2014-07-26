<?php
$this->breadcrumbs=array(
	'Driver Scalemodels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DriverScalemodel', 'url'=>array('index')),
	array('label'=>'Create DriverScalemodel', 'url'=>array('create')),
	array('label'=>'View DriverScalemodel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DriverScalemodel', 'url'=>array('admin')),
);
?>

<h1>Update DriverScalemodel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>