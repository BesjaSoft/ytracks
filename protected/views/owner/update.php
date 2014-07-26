<?php
$this->breadcrumbs=array(
	'Owners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Owner', 'url'=>array('index')),
	array('label'=>'Create Owner', 'url'=>array('create')),
	array('label'=>'View Owner', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Owner', 'url'=>array('admin')),
);
?>

<h1>Update Owner <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>