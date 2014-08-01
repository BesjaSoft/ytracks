<?php

/**
 * @name _results.php
 * @author Bertus Fredriksen
 * @abstract returns a partial view to show the results based on an input class.
 *
 * */
$columns = array();
if ($model->getClassName() == 'Individual') {
    $condition = 'individual_id=' . $model->id . ' and rank <> 0';
    $order = 'rank asc';

    $columns = array($this->setResultSubroundColumn()
        , 'rank'
        , array('name' => 'class', 'value' => '$data->classification')
        , array('name' => '#', 'value' => '$data->number')
        , array('name' => 'performance', 'value' => '$data->performance')
        , 'laps'
        , $this->setResultVehicleColumn()
        , $this->setResultButtonColumn()
    );
} else if ($model->getClassName() == 'Team') {
    //
    $condition = 'team_id=' . $model->id . ' and rank <> 0';
    $order = 'rank asc';

    echo '<h2>Team : ' . $model->name . '</h2>';

    $columns = array(
        $this->setResultSubroundColumn(),
        $this->setResultIndividualColumn(),
        'rank',
        'laps',
        array('name' => 'class', 'value' => '$data->classification'),
        array('name' => '#', 'value' => '$data->number'),
        array('name' => 'performance', 'value' => '$data->performance'),
        $this->setResultVehicleColumn(),
        $this->setResultButtonColumn()
    );
} else if ($model->getClassName() == 'Make') {
    //
    $condition = 'make_id=' . $model->id . ' and rank <> 0';
    $order = 'rank asc';

    echo '<h2>Make : ' . $model->name . '</h2>';

    $columns = array($this->setResultSubroundColumn()
        , $this->setResultIndividualColumn()
        , 'rank'
        , array('name' => 'class', 'value' => '$data->classification')
        , array('name' => '#', 'value' => '$data->number')
        , array('name' => 'performance', 'value' => '$data->performance')
        , 'laps'
        , $this->setResultVehicleColumn()
        , $this->setResultButtonColumn()
    );
} else if ($model->getClassName() == 'Type') {
    //
    $condition = 'type_id=' . $model->id . ' and rank <> 0';
    $order = 'rank asc';

    echo '<h2>Type : ' . $model->make->name . ' ' . $model->name . '</h2>';

    $columns = array($this->setResultSubroundColumn()
        , $this->setResultIndividualColumn()
        , 'rank'
        , array('name' => 'class', 'value' => '$data->classification')
        , array('name' => '#', 'value' => '$data->number')
        , array('name' => 'performance', 'value' => '$data->performance')
        , 'laps'
        , $this->setResultVehicleColumn()
        , $this->setResultButtonColumn()
    );
} else if ($model->getClassName() == 'Vehicle') {
    //
    $condition = 'vehicle_id=' . $model->id . ' and rank <> 0';
    $order = 'rank asc';

    $columns = array('rank'
        , array('name' => 'class', 'value' => '$data->classification')
        , array('name' => '#', 'value' => '$data->number')
        , array('name' => 'performance', 'value' => '$data->performance')
        , 'laps'
        , $this->setResultButtonColumn()
    );
} else if ($model->getClassName() == 'Subround') {
    //
    $condition = 'subround_id=' . $model->id . ' and deleted = 0';
    $order = 'rank asc';

    echo '<h2>Subround : ' . $model->round->name . '/' . $model->subroundtype->name . '</h2>';

    $columns = array(
        array('name' => 'rank', 'htmlOptions' => array('style' => 'text-align: center')),
        $this->showIndividualGrid(),
        $this->showTeamGrid(),
        array('name' => 'class', 'value' => '$data->classification', 'htmlOptions' => array('style' => 'text-align: center')),
        array('name' => '#', 'value' => '$data->number'),
        array('name' => 'performance', 'value' => '$data->performance'),
        $this->setResultVehicleColumn(),
        'laps',
        $this->setResultButtonColumn()
    );
}

echo CHtml::link('New Result', array('/result/create')) . ' ';
echo CHtml::link('Add Participants', array('/subround/addparticipants&id=' . $model->id)) . ' ';
echo CHtml::link('Copy Results', array('/subround/copyresults&id=' . $model->id)) . ' ';

$dataProvider = new CActiveDataProvider(
        'Result', array(
    'criteria' => array('condition' => $condition, 'order' => $order),
    'pagination' => array('pageSize' => 30,),
        )
);


$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'results-grid',
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'type' => 'striped bordered condensed'
        )
);
?>
