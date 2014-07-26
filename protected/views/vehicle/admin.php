<?php
$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Create Vehicle', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vehicle-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vehicles</h1>

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
	'id'=>'vehicle-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=> array(
        array('name'=> 'id','value'=>'$data->id','htmlOptions'=>array('style'=>'text-align: right; width:50px;')),
        $this->showRandomImageGrid(),
        $this->showTypeGrid(),
        'reference',
		'chassisnumber',
		'year',
		/*
		'color_id',
		'condition_id',
		'modifications',
		'licenseplate',
		'remarks',
		'bodywork_id',
		'carrosseriesoort_id',
		'model',
		'options',
		'history',
		'engine',
		'group',
		'first_owner',
		'next_owners',
		'carrossier',
		'comment',
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
            'htmlOptions' => array('style' => 'width:54px;')
		),
	),
)); ?>
