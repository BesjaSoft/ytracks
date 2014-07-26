<?php
$this->breadcrumbs=array(
	'Scales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scale', 'url'=>array('index')),
	array('label'=>'Manage Scale', 'url'=>array('admin')),
);
?>

<h1>Create Scale</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>