<?php
$this->breadcrumbs=array(
	'Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Types</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'make_id',
		'name',
		'alias',
		'description',
		'chassiscode',
		/*
		'cartype_id',
		'constructor_id',
		'bodywork_id',
		'from',
		'untill',
		'motortype_id',
		'motorplace_id',
		'propulsion_id',
		'topspeed',
		'length',
		'width',
		'height',
		'weight',
		'wheelbase',
		'spoorbreedte_voor',
		'spoorbreedte_achter',
		'production_number',
		'registered',
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
