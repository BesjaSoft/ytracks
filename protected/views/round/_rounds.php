<?php

if ($model->getClassName() == 'Circuit') {
    $condition = 'circuit_id=' . $model->id;
    $order = 'start_date desc';
    echo '<h2>Circuit : ' . $model->name . '</h2>';
    echo CHtml::link('New Round', Yii::app()->createUrl('/round/create&circuitid=' . $model->id), array('class' => 'btn btn-primary'));
} else if ($model->getClassName() == 'Project') {
    $condition = 'project_id=' . $model->id;
    $order = 'ordering asc';
    echo '<h2>Project : ' . $model->name . '</h2>';

    echo CHtml::link('New Round', Yii::app()->createUrl('/round/create&projectid=' . $model->id), array('class' => 'btn btn-primary'));
} else if ($model->getClassName() == 'Event') {
    $condition = 'event_id=' . $model->id;
    $order = 'start_date desc';
    echo '<h2>Event : ' . $model->name . '</h2>';
    echo CHtml::link('New Round', array('/round/create&eventid=' . $model->id,));
} else {
    echo 'class onbekend' . $model->getClassName();
    echo CHtml::link('New Round', array('/round/create'));
}

$dataProvider = new CActiveDataProvider('Round', array(
    'criteria' => array(
        'condition' => $condition,
        'order' => $order
    ),
    'pagination' => array(
        'pageSize' => 15,
    ),
        )
);

$this->widget('booster.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'type' => 'striped bordered condensed',
    'template' => "{pager}\n{items}\n{pager}",
    'columns' => array(
        array('type' => 'image', 'value' => '$data->getRandomImage()', 'htmlOptions' => array('style' => 'text-align: center')),
        array(
            'class' => 'booster.widgets.TbEditableColumn',
            'name' => 'ordering',
            'editable' => array(
                'url' => $this->createUrl('round/editableSaver'),
                'placement' => 'right',
            )
        ),
        array(
            'class' => 'booster.widgets.TbEditableColumn',
            'name' => 'name',
            'editable' => array(
                'url' => $this->createUrl('round/editableSaver'),
                'placement' => 'right',
            )
        ),
        'start_date',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/round/view", array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/round/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/round/delete", array("id" => $data->id))',
            'htmlOptions' => array('style' => 'width:60px; text-align:center;')
        )
    ),
        )
);
?>
