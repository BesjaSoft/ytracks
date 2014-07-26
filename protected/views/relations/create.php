<?php
$this->breadcrumbs=array(
	'Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List relations', 'url'=>array('index')),
	array('label'=>'Manage relations', 'url'=>array('admin')),
);
?>

<h1>Create relations</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>