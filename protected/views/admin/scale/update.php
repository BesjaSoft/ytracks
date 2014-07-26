<?php
$this->breadcrumbs=array(
	'Scales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Scale', 'url'=>array('index')),
	array('label'=>'Create Scale', 'url'=>array('create')),
	array('label'=>'View Scale', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Scale', 'url'=>array('admin')),
);
?>

<h1>Update Scale <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>