<?php

$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'shortname',
        'alias',
        'city',
        array('label' => $model->getAttributeLabel('country'),
            'type' => 'image',
            'value' => $model->getFlag($model->country_code, array('size' => '24x24'))
        ),
        array('label' => $model->getAttributeLabel('length')
            , 'type' => 'raw'
            , 'value' => $model->length . ' ' . !isset($model->distance) ? 'unknown' : $model->distance->description,
        ),
        'checked_out',
        'checked_out_time',
        //array( 'label' => $model->getAttributeLabel('published')
        //     , 'type'  => 'raw'
        //     , 'value' => $model->getPublishedImage()
        //     ),
        'ordering',
        'created',
        'modified',
        //array( 'label' => $model->getAttributeLabel('deleted')
        //     , 'type'  => 'raw'
        //     , 'value' => $model->getDeletedImage()
        //     ),
        'deleted_date',
    ),
));
?>
