<?php
$this->breadcrumbs=array(
	'Trounds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tround','url'=>array('index')),
	array('label'=>'Create Tround','url'=>array('create')),
	array('label'=>'View Tround','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tround','url'=>array('admin')),
);
?>

<h1>Update Tround <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>