<?php
$this->breadcrumbs=array(
	'Circuits'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Circuit', 'url'=>array('index')),
	array('label'=>'Create Circuit', 'url'=>array('create')),
	array('label'=>'View Circuit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Circuit', 'url'=>array('admin')),
);
?>

<h1>Update Circuit <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>