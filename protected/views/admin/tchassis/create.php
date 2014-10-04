<?php
$this->breadcrumbs=array(
	'Tchassises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tchassis','url'=>array('index')),
	array('label'=>'Manage Tchassis','url'=>array('admin')),
);
?>

<h1>Create Tchassis</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>