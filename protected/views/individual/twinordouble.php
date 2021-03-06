<?php
$this->breadcrumbs = array(
    'Individuals' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Individual', 'url' => array('index')),
    array('label' => 'Create Individual', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('individual-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Twin Or Doubles</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'twindouble-grid',
    'dataProvider' => $model->getTwinsOrDoubles(),
    'filter' => $model,
    'columns' => array(
        'first_name',
        'last_name',
        'nickname',
        'full_name',
        array(
            'header' => 'nationality',
            'type' => 'image',
            'value' => '$data->getFlag($data->nationality, array("size" => "24x24"))',
            'htmlOptions' => array('style' => 'text-align:center;')
        ),
        'cnt',
        'min_id',
        'max_id',
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'buttons' => array(
                'combine' => array(
                    'label' => 'combine',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/export.png',
                    'url' => 'Yii::app()->controller->createUrl("combine", array("min_id"=>$data->min_id,"max_id"=>$data->max_id))',
                ),
            ),
            'template' => '{view}{update}{delete}{combine}',
            'htmlOptions' => array('style' => 'width:65px;')
        ),
    ),
));
?>
