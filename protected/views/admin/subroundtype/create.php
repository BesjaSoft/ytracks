<?php
$this->breadcrumbs=array(
	'Subroundtypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subroundtype', 'url'=>array('index')),
	array('label'=>'Manage Subroundtype', 'url'=>array('admin')),
);
?>

<h1>Create Subroundtype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>