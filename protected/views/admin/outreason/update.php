<?php
$this->breadcrumbs=array(
	'Outreasons'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Outreason', 'url'=>array('index')),
	array('label'=>'Create Outreason', 'url'=>array('create')),
	array('label'=>'View Outreason', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Outreason', 'url'=>array('admin')),
);
?>

<h1>Update Outreason <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>