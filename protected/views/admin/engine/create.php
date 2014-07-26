<?php
$this->breadcrumbs=array(
	'Engines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Engine', 'url'=>array('index')),
	array('label'=>'Manage Engine', 'url'=>array('admin')),
);
?>

<h1>Create Engine</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>