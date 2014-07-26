<?php
$this->breadcrumbs=array(
	'Driver Scalemodels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DriverScalemodel', 'url'=>array('index')),
	array('label'=>'Manage DriverScalemodel', 'url'=>array('admin')),
);
?>

<h1>Create DriverScalemodel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>