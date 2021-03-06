<?php
if ($model->getClassName() == 'Round') {
    $condition = 'round_id=' . $model->id;
    $order = 'round_id,ordering asc';
} else {
    echo 'class onbekend' . $model->getClassName();
}
$dataProvider = new CActiveDataProvider('Subround',
        array(
    'criteria' => array(
        'condition' => $condition,
        'order' => $order
    ),
    'pagination' => array(
        'pageSize' => 15,
    ),
        ));
?><h2><?php echo $model->getClassName() . ' : ' . $model->{$model->getDisplayField()}; ?></h2>
<?php echo CHtml::link('New Subround', Yii::app()->createUrl('/subround/create&roundid=' . $model->id),
        array('class' => 'btn btn-primary'));
?> 
<?php echo CHtml::link('Copy Subrounds', Yii::app()->createUrl('/round/copySubrounds&id=' . $model->id),
        array('class' => 'btn btn-default'));
?>
<?php
$this->widget('booster.widgets.TbGridView',
        array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'columns' => array('ordering',
        array('name' => 'subroundtype_id', 'value' => '$data->subroundtype->name'),
        array('name' => 'raceclass_id', 'value' => 'isset($data->raceclass_id) ? $data->raceclass->name : $data->raceclass_id'),
        'start_date',
        'end_date',
        array('class' => 'booster.widgets.TbButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/subround/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/subround/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/subround/delete", array("id" => $data->id))'
))));
?>
