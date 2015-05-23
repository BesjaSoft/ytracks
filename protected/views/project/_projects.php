<?php

if ($model->getClassName() == 'Competition') {
    $condition = 'competition_id=' . $model->id;
} else if ($model->getClassName() == 'Season') {
    $condition = 'season_id=' . $model->id;
} else {
    echo 'class onbekend' . $model->getClassName();
}

echo CHtml::link('New Project', array('/project/create'));

$dataProvider = new CActiveDataProvider('Project', array(
    'criteria' => array('condition' => $condition,),
    'pagination' => array('pageSize' => 15,),
        ));

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'project-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'name',
        $this->showCompetitionGrid(),
        $this->showSeasonGrid(),
        $this->showProjectButtonGrid()
)));
?>
