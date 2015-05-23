<?php
/* @var $this IndividualReferenceController */
/* @var $model IndividualReference */

$this->breadcrumbs=array(
	'Individual References'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List IndividualReference', 'url'=>array('index')),
	array('label'=>'Create IndividualReference', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#individual-reference-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Individual References</h1>

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
	'id'=>'individual-reference-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'individual_id',
		'source_id',
		'source_reference',
		'full_name',
		'first_name',
		/*
		'last_name',
		'createdon',
		'modifiedon',
		'deleted',
		'deletedon',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
