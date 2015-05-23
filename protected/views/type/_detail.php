<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        array( 'label' => $model->getAttributeLabel('make_id')
             , 'type'  => 'raw'
             , 'value' => CHtml::Link( CHtml::encode($model->make->name)
                                     , array('make/view','id'=>$model->make_id)
                                     )
             ),
        'name',
        'alias',
        'description',
        'chassiscode',
        array
       ( 'label' => $model->getAttributeLabel('cartype_id')
        , 'type'  => 'raw'
        , 'value' => isset($model->cartype_id) ? CHtml::Link( CHtml::encode($model->cartype->name), array('cartype/view','id'=>$model->cartype_id)) : $model->cartype_id
        ),
        array('label' => $model->getAttributeLabel('constructor_id')
                 ,'type'  => 'raw'
                 ,'value' => (isset($model->constructor_id) ? CHtml::Link( CHtml::encode($model->constructor->description)
                                        , array('constructor/view','id'=>$model->constructor_id)
                                        ) : "" )
            ),
        array('label' => $model->getAttributeLabel('bodywork_id')
                 ,'type'  => 'raw'
                 ,'value' => (isset($model->bodywork_id) ? CHtml::Link( CHtml::encode($model->bodywork->description)
                                        , array('bodywork/view','id'=>$model->bodywork_id)
                                        ) : $model->bodywork_id )
            ),
        'from',
        'untill',
        array('label' => $model->getAttributeLabel('motortype_id')
                 ,'type'  => 'raw'
                 ,'value' => (isset($model->motortype_id) ? CHtml::Link( CHtml::encode($model->motortype->description)
                                        , array('motortype/view','id'=>$model->motortype_id)
                                        ) : $model->motortype_id )
            ),
        array('label' => $model->getAttributeLabel('engineposition_id')
                 ,'type'  => 'raw'
                 ,'value' => (isset($model->engineposition_id) ? CHtml::Link( CHtml::encode($model->engineposition->description)
                                        , array('engineposition/view','id'=>$model->engineposition_id)
                                        ) : $model->engineposition_id)
            ),
        array('label' => $model->getAttributeLabel('propulsion_id')
                 ,'type'  => 'raw'
                 ,'value' => (isset($model->propulsion) ? CHtml::Link( CHtml::encode($model->propulsion->description)
                                        , array('propulsion/view','id'=>$model->propulsion_id)
                                        ) : $model->propulsion_id )
            ),
        'topspeed',
        'length',
        'width',
        'height',
        'weight',
        'wheelbase',
        'spoorbreedte_voor',
        'spoorbreedte_achter',
        'production_number',
        'registered',
        'published',
        'ordering',
        'checked_out',
        'checked_out_time',
        'created',
        'modified',
        'deleted',
        'deleted_date',
    ),
));
?>
