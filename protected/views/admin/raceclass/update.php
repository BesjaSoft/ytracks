<?php
$this->breadcrumbs=array(
	'Raceclasses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Raceclass', 'url'=>array('index')),
	array('label'=>'Create Raceclass', 'url'=>array('create')),
	array('label'=>'View Raceclass', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Raceclass', 'url'=>array('admin')),
);
?>

<h1>Update Raceclass <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>