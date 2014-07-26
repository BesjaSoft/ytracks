<?php
$this->breadcrumbs=array(
	'Makes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Make', 'url'=>array('index')),
	array('label'=>'Create Make', 'url'=>array('create')),
	array('label'=>'View Make', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>Update Make <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>