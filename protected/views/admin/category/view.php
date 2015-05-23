<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Category','url'=>array('index')),
	array('label'=>'Create Category','url'=>array('create')),
	array('label'=>'Update Category','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category','url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'asset_id',
		'parent_id',
		'lft',
		'rgt',
		'level',
		'path',
		'extension',
		'title',
		'alias',
		'note',
		'description',
		'published',
		'checked_out',
		'checked_out_time',
		'access',
		'params',
		'metadesc',
		'metakey',
		'metadata',
		'created_user_id',
		'created_time',
		'modified_user_id',
		'modified_time',
		'hits',
		'language',
		'version',
	),
)); ?>
