<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Menu','url'=>array('index')),
	array('label'=>'Create Menu','url'=>array('create')),
	array('label'=>'Update Menu','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Menu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Menu','url'=>array('admin')),
);
?>

<h1>View Menu #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'menutype',
		'title',
		'alias',
		'note',
		'path',
		'link',
		'type',
		'published',
		'parent_id',
		'level',
		'component_id',
		'checked_out',
		'checked_out_time',
		'browserNav',
		'access',
		'img',
		'template_style_id',
		'params',
		'lft',
		'rgt',
		'home',
		'language',
		'client_id',
	),
)); ?>
