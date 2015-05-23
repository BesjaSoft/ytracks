<?php

if ($model->getClassName() == 'Project') {
    $condition = 'project_id=' . $model->id;
    $order = 'project_id desc';
} else if ($model->getClassName() == 'Individual') {
    $condition = 'individual_id=' . $model->id;
    $order = 'project_id desc';
} else if ($model->getClassName() == 'Team') {
    $condition = 'team_id=' . $model->id;
    $order = 'from,project_id desc';
} else {
    echo 'class onbekend' . $model->getClassName();
}

echo CHtml::link('New Participant', Yii::app()->createUrl('/participant/create', array('project_id' => $model->id)));

$dataProvider = new CActiveDataProvider('Participant', array(
    'criteria' => array(
        'condition' => $condition,
        'order' => $order
    ),
    'pagination' => array('pageSize' => 15,),
        ));

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'condensed bordered striped',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        //$this->showIndividualGrid(),
        'number',
        array('name' => 'Project', 'value' => '$data->project->name'
        ),
        $this->showTeamGrid(),
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/participant/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/participant/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/participant/delete", array("id" => $data->id))'
        )
    ),
        )
);
?>
