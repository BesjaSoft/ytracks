<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Result', 'url'=>array('index')),
	array('label'=>'Manage Result', 'url'=>array('admin')),
);
?>

<h1>Create Result</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>