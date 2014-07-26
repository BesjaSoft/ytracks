<?php
$this->breadcrumbs=array(
	'Subroundtypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subroundtype', 'url'=>array('index')),
	array('label'=>'Create Subroundtype', 'url'=>array('create')),
	array('label'=>'View Subroundtype', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Subroundtype', 'url'=>array('admin')),
);
?>

<h1>Update Subroundtype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>