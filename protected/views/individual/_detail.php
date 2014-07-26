<?php

$this->widget('bootstrap.widgets.TbDetailView',
        array(
    'data' => $model,
    'attributes' => array(
        'first_name',
        'last_name',
        'nickname',
        'height',
        'weight',
        'gender',
        array(
            'label' => 'Nationality',
            'type' => 'image',
            'value' => $model->getFlag($model->nationality, array('size' => '24'))
        ),
        array('label' => 'Birth',
            'type' => 'html',
            'value' => CHtml::encode($model->date_of_birth) . ', ' . Chtml::encode($model->place_of_birth) . ' ' .
            Chtml::Image($model->getFlag($model->country_of_birth, array('size' => '24')))
        ),
        array('label' => 'Death',
            'type' => 'html',
            'value' => CHtml::encode($model->date_of_death) . ', ' . CHtml::encode($model->place_of_death) . ' ' .
            Chtml::Image($model->getFlag($model->country_of_death, array('size' => '24')))
        ),
        array(
            'label' => $model->getAttributeLabel('description'),
            'type' => 'html',
            'value' => $model->description
        ),
        //'published',
        $model->getPublishedModelDetailView()
    ),
));
?>
