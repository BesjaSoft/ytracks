<?php
$this->breadcrumbs=array(
	'Individual References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IndividualReference','url'=>array('index')),
	array('label'=>'Manage IndividualReference','url'=>array('admin')),
);
?>

<h1>Create IndividualReference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>