<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('scalemodel-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
// ================================================================================
// based on the model of origin do some intelligent stuff
if ($model->getClassName() == 'Make') {
    $display = $this->showTypeGrid();
} elseif ($model->getClassName() == 'Type') {
    $display = $this->showMakeGrid();
}

echo CHtml::link('New Scalemodel', array('/scalemodel/create'));

if (isset($search)) {
    $scaleModel = $search;
    if ($model->getClassName() == 'Make') {
        $scaleModel->make_id = $model->id;
    } elseif ($model->getClassName() == 'Type') {
        $scaleModel->type_id = $model->id;
    }
} else {
    $scaleModel = new Scalemodel();

    if ($model->getClassName() == 'Make') {
        $scaleModel->make_id = $model->id;
    } elseif ($model->getClassName() == 'Type') {
        $scaleModel->type_id = $model->id;
    }
}

// ================================================================================
// show the widget
$this->widget('zii.widgets.grid.CGridView', array('id' => 'scalemodel-grid',
    'dataProvider' => $scaleModel->search(),
    'filter' => $scaleModel,
    'columns' => array(
        array('type' => 'image', 'value' => '$data->getRandomThumbnail()', 'htmlOptions' => array('style' => 'text-align: center')),
        $display,
        'description',
        'reference',
        'year',
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/scalemodel/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/scalemodel/update", array("id" => $data->id))'
))));
?>
