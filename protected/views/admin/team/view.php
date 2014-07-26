<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Team', 'url'=>array('index')),
	array('label'=>'Create Team', 'url'=>array('create')),
	array('label'=>'Update Team', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Team', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Team', 'url'=>array('admin')),
);
?>

<h1>View Team #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'club_id',
		'name',
		'alias',
		'short_name',
		'published',
		'acronym',
		'constructor_id',
		'picture',
		'picture_small',
		'country_code',
		'description',
		'admin_id',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
