<?php
$this->breadcrumbs=array(
	'Cartypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cartype','url'=>array('index')),
	array('label'=>'Manage Cartype','url'=>array('admin')),
);
?>

<h1>Create Cartype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>