<?php
$this->breadcrumbs=array(
	'Trounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tround', 'url'=>array('index')),
	array('label'=>'Manage Tround', 'url'=>array('admin')),
);
?>

<h1>Create Tround</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>