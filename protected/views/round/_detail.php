<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        /*array('label' => $model->getAttributeLabel('event_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->event->name)
                    , array('event/view', 'id' => $model->event_id)
            )
        ),*/
        array('label' => $model->getAttributeLabel('project_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->project->name)
                    , array('project/view', 'id' => $model->project_id)
            )
        ),
        array('label' => $model->getAttributeLabel('circuit_id')
            , 'type' => 'raw'
            , 'value' => isset($model->circuit_id) ? CHtml::Link(CHtml::encode($model->circuit->name)
                    , array('circuit/view', 'id' => $model->circuit_id)) : $model->circuit_id
        ),
        'ordering',
        'laps',
        /*array('label' => $model->getAttributeLabel('distance_id'),
            'type' => 'raw',
            'value' => $model->length . ' ' . isset($model->distance_id) ? CHtml::Link(CHtml::encode($model->distance->description)
                            , array('unit/view', 'id' => $model->distance_id)) : $model->distance_id
        ),*/
        'start_date',
        'end_date',
        'description',
        'comment',
        'checked_out',
        'checked_out_time',
        array('label' => $model->getAttributeLabel('published'),
            'type' => 'image',
            'value' => $model->getPublishedImage()
        ),
        'manches',
        'created',
        'modified',
        array('label' => $model->getAttributeLabel('deleted'),
            'type' => 'image',
            'value' => $model->getDeletedImage()
        ),
        'deleted_date',
    ),
));
?>
