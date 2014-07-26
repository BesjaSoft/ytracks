<?php
$this->breadcrumbs=array(
	'Raceclasses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Raceclass', 'url'=>array('index')),
	array('label'=>'Manage Raceclass', 'url'=>array('admin')),
);
?>

<h1>Create Raceclass</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>