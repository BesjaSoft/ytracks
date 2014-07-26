<?php
$this->breadcrumbs=array(
	'Outreasons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Outreason', 'url'=>array('index')),
	array('label'=>'Manage Outreason', 'url'=>array('admin')),
);
?>

<h1>Create Outreason</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>