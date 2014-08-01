<?php
$this->breadcrumbs=array(
	'Extensions'=>array('index'),
	$model->name=>array('view','id'=>$model->extension_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Extension','url'=>array('index')),
	array('label'=>'Create Extension','url'=>array('create')),
	array('label'=>'View Extension','url'=>array('view','id'=>$model->extension_id)),
	array('label'=>'Manage Extension','url'=>array('admin')),
);
?>

<h1>Update Extension <?php echo $model->extension_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>