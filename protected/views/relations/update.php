<?php
$this->breadcrumbs=array(
	'Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List relations', 'url'=>array('index')),
	array('label'=>'Create relations', 'url'=>array('create')),
	array('label'=>'View relations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage relations', 'url'=>array('admin')),
);
?>

<h1>Update relations <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>