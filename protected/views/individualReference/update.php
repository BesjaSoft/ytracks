<?php
/* @var $this IndividualReferenceController */
/* @var $model IndividualReference */

$this->breadcrumbs=array(
	'Individual References'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IndividualReference', 'url'=>array('index')),
	array('label'=>'Create IndividualReference', 'url'=>array('create')),
	array('label'=>'View IndividualReference', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IndividualReference', 'url'=>array('admin')),
);
?>

<h1>Update IndividualReference <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>