<?php

if ($model->getClassName() == 'Circuit') {
    $condition = 'circuit_id=' . $model->id;
    $order = 'start_date desc';
    echo '<h2>Circuit : ' . $model->name . '</h2>';
} else if ($model->getClassName() == 'Project') {
    $condition = 'project_id=' . $model->id;
    $order = 'ordering asc';
    echo '<h2>Project : ' . $model->name . '</h2>';
} else if ($model->getClassName() == 'Event') {
    $condition = 'event_id=' . $model->id;
    $order = 'start_date desc';
    echo '<h2>Event : ' . $model->name . '</h2>';
} else {
    echo 'class onbekend' . $model->getClassName();
}

echo CHtml::link('New Round', array('/round/create'));

$dataProvider = new CActiveDataProvider(
                'Round', array(
            'criteria' => array(
                'condition' => $condition,
                'order' => $order
            ),
            'pagination' => array(
                'pageSize' => 15,
            ),
                )
);

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('type' => 'image', 'value' => '$data->getRandomImage()', 'htmlOptions' => array('style' => 'text-align: center')),
        'ordering',
        'name',
        'start_date',
        array(
            'class' => 'CButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/round/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/round/update", array("id" => $data->id))',
            'htmlOptions' => array('style'=>'width:60px; text-align:center;')
        )
    ),
        )
);
?>
