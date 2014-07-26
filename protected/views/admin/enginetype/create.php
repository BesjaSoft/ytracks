<?php
$this->breadcrumbs=array(
	'Enginetypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Enginetype', 'url'=>array('index')),
	array('label'=>'Manage Enginetype', 'url'=>array('admin')),
);
?>

<h1>Create Enginetype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>