<?php
/* @var $this IndividualReferenceController */
/* @var $model IndividualReference */

$this->breadcrumbs=array(
	'Individual References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IndividualReference', 'url'=>array('index')),
	array('label'=>'Create IndividualReference', 'url'=>array('create')),
	array('label'=>'Update IndividualReference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IndividualReference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IndividualReference', 'url'=>array('admin')),
);
?>

<h1>View IndividualReference #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'individual_id',
		'source_id',
		'source_reference',
		'full_name',
		'first_name',
		'last_name',
		'createdon',
		'modifiedon',
		'deleted',
		'deletedon',
	),
)); ?>
