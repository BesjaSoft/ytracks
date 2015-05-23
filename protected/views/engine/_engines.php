<?php

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

if ($model->getClassName() == 'Make') {
    echo CHtml::link('New Engine', array('/engine/create'));
}

if (isset($search)) {
    $engine = $search;
    $engine->make_id = $model->id;
} else {
    $engine = new Engine();
    $engine->make_id = $model->id;
}

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'engine-grid',
    'type' => 'striped condensed bordered',
    'dataProvider' => $engine->searchEngines(),
    'filter' => $engine,
    'columns' => array(
        array(
            'type' => 'image',
            'value' => '$data->getRandomImage()',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
        'name',
        'code',
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/engine/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/engine/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/engine/delete", array("id" => $data->id))'
))));
?>
