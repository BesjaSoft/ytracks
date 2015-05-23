<?php

if ($model->getClassName() == 'Type') {
    $condition = 'type_id=' . $model->id;
    $order = 'chassisnumber asc';

    echo '<h2>Type : ' . $model->make->name . ' ' . $model->name . '</h2>';
    echo CHtml::link('New Vehicle', array('/vehicle/create', 'type_id' => $model->id));

    $columns = array(
        $this->showRandomImageGrid(),
        'chassisnumber',
        'reference',
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/vehicle/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/Vehicle/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/Vehicle/delete", array("id" => $data->id))'
        )
    );
}

$dataProvider = new CActiveDataProvider('Vehicle', array('criteria' => array('condition' => $condition,
        'order' => $order),
    'pagination' => array('pageSize' => 15,),
        )
);

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'columns' => $columns
        )
);
?>
