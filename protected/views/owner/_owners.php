<?php

if ($model->getClassName() == 'Vehicle') {
    $condition = 'vehicle_id=' . $model->id;
    $order = 'individual_id desc';
} else if ($model->getClassName() == 'Individual') {
    $condition = 'individual_id=' . $model->id;
    $order = 'vehicle_id desc';
} else if ($model->getClassName() == 'Team') {
    $condition = 'team_id=' . $model->id;
    $order = 'from,vehicle_id desc';
} else {
    echo 'class onbekend' . $model->getClassName();
}
$dataProvider = new CActiveDataProvider('Owner', array(
    'criteria' => array(
        'condition' => $condition,
        'order' => $order
    ),
    'pagination' => array(
        'pageSize' => 15,
    ),
        ));

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'condensed bordered striped',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        array('name' => 'vehicle_id'
            , 'value' => '$data->vehicle->type->make->name." ".$data->vehicle->type->name." ".$data->vehicle->chassisnumber'),
        array('name' => 'individual_id'
            , 'value' => '$data->individual->full_name'
        ),
        'team_id',
        'from',
        'untill',
        /*
          'description',
          'current',
          'published',
          'ordering',
          'checked_out',
          'checked_out_time',
          'created',
          'modified',
          'deleted',
          'deleted_date',
         */
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/owner/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/owner/update", array("id" => $data->id))'
))));
?>
