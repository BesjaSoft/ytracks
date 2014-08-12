<?php
$this->breadcrumbs = array(
    'Results' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Result', 'url' => array('index')),
    array('label' => 'Create Result', 'url' => array('create')),
    array('label' => 'Update Result', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Result', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Result', 'url' => array('admin')),
);
?>

<h1>View Result #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        //array('label' => $model->getAttributeLabel('participant_id')
        //     ,'type'  => 'raw'
        //     ,'value' => CHtml::Link( CHtml::encode($model->participant->name)
        //                            , array('participant/view','id'=>$model->participant_id)
        //                            )
        //),
        array('label' => $model->getAttributeLabel('individual_id'),
            'type' => 'raw',
            'value' => CHtml::Link(CHtml::encode($model->individual->full_name), array('individual/view', 'id' => $model->individual_id)
            )
        ),
        array('label' => $model->getAttributeLabel('team_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->team->name)
                    , array('team/view', 'id' => $model->team_id)
            )
        ),
        array('label' => $model->getAttributeLabel('subround_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->subround->round->name)
                    , array('subround/view', 'id' => $model->subround_id)
            ) . ' ' .
            CHtml::Link(CHtml::encode($model->subround->subroundtype->name)
                    , array('subroundtype/view', 'id' => $model->subround->subroundtype_id)
            )
        ),
        array('name' => 'raceclass_id'
            , 'type' => 'raw'
            , 'value' => isset($model->raceclass_id) ? CHtml::Link(CHtml::encode($model->raceclass->name)
                            , array('raceclass/view', 'id' => $model->raceclass_id)
                    ) : $model->raceclass_id
        ),
        'number',
        'rank',
        'classification',
        'performance',
        'laps',
        'bonus_points',
        'shared_drive',
        array('name' => 'vehicle_id'
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->make->name)
                    , array('make/view', 'id' => $model->make_id)
            )
            . ' '
            . (isset($model->type_id) ? CHtml::Link(CHtml::encode($model->type->name)
                            , array('type/view', 'id' => $model->type_id)
                    ) : '')
            . ' '
            . (isset($model->vehicle_id) ? CHtml::Link(CHtml::encode($model->vehicle->chassisnumber)
                            , array('vehicle/view', 'id' => $model->vehicle_id)) : ''
            )
        ),
        array('name' => 'engine_id',
            'type' => 'raw', 
            'value' => (isset($model->engine_id) ? CHtml::Link(CHtml::encode($model->engine->getFullname())
                            , array('engine/view', 'id' => $model->engine_id)) : $model->engine_id
            )
        ),
        array('name' => 'tyre_id'
            , 'type' => 'raw'
            , 'value' => (isset($model->tyre_id) ? CHtml::Link(CHtml::encode($model->tyre->make->name)
                            , array('tyre/view', 'id' => $model->tyre_id)) : $model->tyre_id
            )
        ),
        array('label' => $model->getAttributeLabel('outreason_id')
            , 'type' => 'raw'
            , 'value' => (isset($model->outreason_id) ? CHtml::Link(CHtml::encode($model->outreason->name)
                            , array('outreason/view', 'id' => $model->outreason_id)) : $model->outreason_id
            )
        ),
        'comment',
        /* array('label' => $model->getAttributeLabel('tresult_id')
          ,'type'  => 'raw'
          ,'value' => CHtml::Link( CHtml::encode($model->tresult->name)
          , array('tresult/view','id'=>$model->tresult_id)
          )
          ), */
        'tresult_id',
        'checked_out',
        'checked_out_time',
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
