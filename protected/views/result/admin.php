<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Result', 'url'=>array('index')),
	array('label'=>'Create Result', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('result-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Results</h1>

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
	'id'=>'result-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		$this->showIndividualGrid(),
		$this->showTeamGrid(),
		'subround_id',
		'raceclass_id',
		/*
		'number',
		'rank',
		'classification',
		'performance',
		'laps',
		'bonus_points',
		'shared_drive',
		'make_id',
		'type_id',
		'vehicle_id',
		'engine_id',
		'tyre_id',
		'outreason_id',
		'comment',
		'tresult_id',
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
