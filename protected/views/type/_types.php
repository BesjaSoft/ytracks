<?php

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

if ($model->getClassName() == 'Make') {

    echo CHtml::link('New Type', array('/type/create'));
}

if (isset($search)) {
    $type = $search;
    $type->make_id = $model->id;
} else {
    $type = new Type();
    $type->make_id = $model->id;
}

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'type-grid',
    'dataProvider' => $type->searchTypes(),
    'filter' => $type,
    'columns' => array(
        array(
            'type' => 'image',
            'value' => '$data->getRandomImage()',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
        'name',
        'chassiscode',
        'from',
        'untill',
        'production_number',
        'registered',
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/type/view", array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/type/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/type/delete", array("id" => $data->id))'
))));
?>
