<?php
$this->breadcrumbs=array(
	'Tevents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tevent','url'=>array('index')),
	array('label'=>'Manage Tevent','url'=>array('admin')),
);
?>

<h1>Create Tevent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>