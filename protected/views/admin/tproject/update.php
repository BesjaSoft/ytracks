<?php
$this->breadcrumbs=array(
	'Tprojects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tproject','url'=>array('index')),
	array('label'=>'Create Tproject','url'=>array('create')),
	array('label'=>'View Tproject','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tproject','url'=>array('admin')),
);
?>

<h1>Update Tproject <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>