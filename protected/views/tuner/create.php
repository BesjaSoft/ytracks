<?php
$this->breadcrumbs=array(
	'Tuners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tuner','url'=>array('index')),
	array('label'=>'Manage Tuner','url'=>array('admin')),
);
?>

<h1>Create Tuner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>