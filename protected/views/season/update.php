<?php
$this->breadcrumbs=array(
	'Seasons'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Season', 'url'=>array('index')),
	array('label'=>'Create Season', 'url'=>array('create')),
	array('label'=>'View Season', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Season', 'url'=>array('admin')),
);
?>

<h1>Update Season <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>