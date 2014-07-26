<?php
$this->breadcrumbs=array(
	'Makes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Make', 'url'=>array('index')),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>Create Make</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>