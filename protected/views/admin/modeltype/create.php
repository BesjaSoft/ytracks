<?php
$this->breadcrumbs=array(
	'Modeltypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Modeltype', 'url'=>array('index')),
	array('label'=>'Manage Modeltype', 'url'=>array('admin')),
);
?>

<h1>Create Modeltype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>