<?php
$this->breadcrumbs=array(
	'Tindividuals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tindividual','url'=>array('index')),
	array('label'=>'Manage Tindividual','url'=>array('admin')),
);
?>

<h1>Create Tindividual</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>