<?php
$this->breadcrumbs=array(
	'Tindividuals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tindividual','url'=>array('index')),
	array('label'=>'Create Tindividual','url'=>array('create')),
	array('label'=>'View Tindividual','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tindividual','url'=>array('admin')),
    array('label'=>'Export Tindividual','url'=>array('export','id'=>$model->id)),
);
?>

<h1>Update Tindividual <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>