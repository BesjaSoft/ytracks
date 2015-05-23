<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Content','url'=>array('index')),
	array('label'=>'Create Content','url'=>array('create')),
	array('label'=>'Update Content','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Content','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Content','url'=>array('admin')),
);
?>

<h1>View Content #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'asset_id',
		'title',
		'alias',
		'introtext',
		'fulltext',
		'state',
		'catid',
		'created',
		'created_by',
		'created_by_alias',
		'modified',
		'modified_by',
		'checked_out',
		'checked_out_time',
		'publish_up',
		'publish_down',
		'images',
		'urls',
		'attribs',
		'version',
		'ordering',
		'metakey',
		'metadesc',
		'access',
		'hits',
		'metadata',
		'featured',
		'language',
		'xreference',
		'old_id',
	),
)); ?>
