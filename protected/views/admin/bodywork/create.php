<?php
$this->breadcrumbs=array(
	'Bodyworks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bodywork','url'=>array('index')),
	array('label'=>'Manage Bodywork','url'=>array('admin')),
);
?>

<h1>Create Bodywork</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>