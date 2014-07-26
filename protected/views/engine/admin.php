<?php
$this->breadcrumbs=array(
	'Engines'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Engine', 'url'=>array('index')),
	array('label'=>'Create Engine', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('engine-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Engines</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	'id'=>'engine-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'template'=>"{items}",
	'columns'=>array(
		array("name" => 'id', 'header'=>'#'),
		array('name'=> 'make_id','type'=>'raw','value'=>'$data->make->name'),
		'name',
		'alias',
		'description',
		'code',
		/*
		'parent_id',
		'tuner_id',
		'enginetype_id',
		'compression',
		'cams',
		'valves_cylinder',
		'bore',
		'stroke',
		'capacity',
		'capacity_id',
		'power',
		'power_id',
		'power_revs',
		'torque',
		'torque_id',
		'torque_rev',
		'induction',
		'ignition_id',
		'fuelsystem_id',
		'published',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
