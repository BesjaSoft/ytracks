<?php

$this->widget('booster.widgets.TbDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        array('label' => $model->getAttributeLabel('round_id'),
            'type'  => 'raw',
            'value' => CHtml::Link(CHtml::encode($model->round->name)
                    , array('round/view', 'id' => $model->round_id)
            )
        ),
        array('label' => $model->getAttributeLabel('subroundtype_id')
            , 'type'  => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->subroundtype->name)
                    , array('subroundtype/view', 'id' => $model->subroundtype_id)
            )
        ),
        array('label' => $model->getAttributeLabel('raceclass_id')
            , 'type'  => 'raw'
            , 'value' => isset($model->raceclass_id) ? CHtml::Link(CHtml::encode($model->raceclass->name)
                            , array('raceclass/view', 'id' => $model->raceclass_id)
                    ) : $model->raceclass_id
        ),
        'name',
        'ordering',
        'start_date',
        'end_date',
        'description',
        'comment',
        'factor',
        array('label' => $model->getAttributeLabel('published')
            , 'type'  => 'raw'
            , 'value' => $model->getPublishedImage()
        ),
    ),
));
?>
