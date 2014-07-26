<?php
$this->breadcrumbs=array(
	'Ttypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ttype','url'=>array('index')),
	array('label'=>'Create Ttype','url'=>array('create')),
	array('label'=>'View Ttype','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Ttype','url'=>array('admin')),
);
?>

<h1>Update Ttype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>