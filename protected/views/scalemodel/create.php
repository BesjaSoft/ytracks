<?php
$this->breadcrumbs=array(
	'Scalemodels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scalemodel','url'=>array('index')),
	array('label'=>'Manage Scalemodel','url'=>array('admin')),
);
?>

<h1>Create Scalemodel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>