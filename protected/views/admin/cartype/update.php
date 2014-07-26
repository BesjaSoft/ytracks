<?php
$this->breadcrumbs=array(
	'Cartypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cartype','url'=>array('index')),
	array('label'=>'Create Cartype','url'=>array('create')),
	array('label'=>'View Cartype','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Cartype','url'=>array('admin')),
);
?>

<h1>Update Cartype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>