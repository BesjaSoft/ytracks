<?php
if ($model->getClassName() == 'Round') {
    $condition = 'round_id=' . $model->id;
    $order = 'round_id,ordering asc';
} else {
    echo 'class onbekend' . $model->getClassName();
}
$dataProvider = new CActiveDataProvider('Subround', array(
    'criteria' => array(
        'condition' => $condition,
        'order' => $order
    ),
    'pagination' => array(
        'pageSize' => 15,
    ),
        ));
?><h2><?php echo $model->getClassName() . ' : ' . $model->{$model->getDisplayField()}; ?></h2>
<?php echo CHtml::link('New Subround', array('/subround/create')); ?><br/>
<?php echo CHtml::link('Copy Subrounds', array('/round/copySubrounds&id=' . $model->id)); ?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'columns' => array('ordering',
        array('name' => 'subroundtype_id', 'value' => '$data->subroundtype->name'),
        'start_date',
        'end_date',
        array('class' => 'CButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("/subround/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/subround/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/subround/delete", array("id" => $data->id))'
        )
    ),
        )
);
?>
