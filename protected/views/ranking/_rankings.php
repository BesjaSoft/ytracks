<?php

if ($model->getClassName() == 'Project') {
    $condition = 'project_id=' . $model->id;
    $order = 'rank asc';
    $display = array('name' => 'individual_id', 'type' => 'raw', 'value' => 'CHTML::link(CHTML::encode($data->individual->full_name),array("individual/view","id"=>$data->individual_id))');
} else if ($model->getClassName() == 'Individual') {
    $condition = 'individual_id=' . $model->id;
    $order = 'project_id, rank asc ';
    $display = array('name' => 'project_id', 'type' => 'raw', 'value' => 'CHTML::link(CHTML::encode($data->project->name),array("project/view","id"=>$data->project_id))');
} else {

    echo 'Class unknown : ' . $model->getClassName();
}

// link to create a new ranking record
echo CHtml::link('New Ranking', array('/ranking/create'));

// Initialize the data provider
$dataProvider = new CActiveDataProvider('Ranking', array(
            'criteria' => array(
                'condition' => $condition,
                'order' => $order
            ),
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'rankings-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'columns' => array('id',
        'rank',
        $display,
        'points',
        array(
            'class' => 'CButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/ranking/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/ranking/update", array("id" => $data->id))'
        )
    ),
));
?>
