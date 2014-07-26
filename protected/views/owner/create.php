<?php
$this->breadcrumbs=array(
	'Owners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Owner', 'url'=>array('index')),
	array('label'=>'Manage Owner', 'url'=>array('admin')),
);
?>

<h1>Create Owner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>