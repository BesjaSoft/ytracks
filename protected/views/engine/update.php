<?php
$this->breadcrumbs=array(
	'Engines'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Engine', 'url'=>array('index')),
	array('label'=>'Create Engine', 'url'=>array('create')),
	array('label'=>'View Engine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Engine', 'url'=>array('admin')),
);
?>

<h1>Update Engine <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>