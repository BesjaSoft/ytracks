<?php
$this->breadcrumbs=array(
	'Circuits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Circuit', 'url'=>array('index')),
	array('label'=>'Manage Circuit', 'url'=>array('admin')),
);
?>

<h1>Create Circuit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>