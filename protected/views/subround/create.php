<?php
$this->breadcrumbs=array(
	'Subrounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subround', 'url'=>array('index')),
	array('label'=>'Manage Subround', 'url'=>array('admin')),
);
?>

<h1>Create Subround</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>