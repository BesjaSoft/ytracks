<?php
$this->breadcrumbs=array(
	'Ttypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ttype','url'=>array('index')),
	array('label'=>'Manage Ttype','url'=>array('admin')),
);
?>

<h1>Create Ttype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>