<?php
$this->breadcrumbs=array(
	'Rankings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ranking', 'url'=>array('index')),
	array('label'=>'Create Ranking', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ranking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rankings</h1>

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
	'id'=>'ranking-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'individual_id', 'value'=>'$data->individual->full_name'),
		array('name'=>'project_id'   , 'value'=>'$data->project->name'        ),
		array('name'=>'team_id'      , 'value'=>'$data->team->name'           ),
		'rank',
		'points',
		/*
		'raceclass_id',
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
