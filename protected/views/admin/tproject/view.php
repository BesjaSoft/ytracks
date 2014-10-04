<?php
$this->breadcrumbs=array(
	'Tprojects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tproject','url'=>array('index')),
	array('label'=>'Create Tproject','url'=>array('create')),
	array('label'=>'Update Tproject','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tproject','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tproject','url'=>array('admin')),
);
?>

<h1>View Tproject #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		$this->showContentDetail($model),
		$this->showProjectDetail($model),
		$this->showCompetitionDetail($model),
		$this->showSeasonDetail($model),
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
