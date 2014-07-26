<?php
$this->breadcrumbs=array(
	'Tprojects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tproject', 'url'=>array('index')),
	array('label'=>'Manage Tproject', 'url'=>array('admin')),
);
?>

<h1>Create Tproject</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>