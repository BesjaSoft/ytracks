<?php
$this->breadcrumbs=array(
	'Enginetypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Enginetype', 'url'=>array('index')),
	array('label'=>'Create Enginetype', 'url'=>array('create')),
	array('label'=>'View Enginetype', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Enginetype', 'url'=>array('admin')),
);
?>

<h1>Update Enginetype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>