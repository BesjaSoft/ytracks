
<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('label' => $model->getAttributeLabel('founder_id'),
            'type' => 'raw',
            'value' => (isset($model->individual) ? CHtml::Link(CHtml::encode($model->individual->full_name)
                            , array('individual/view', 'id' => $model->founder_id)) : "")
        ),
        'logo',
        'ordering',
        'checked_out',
        'checked_out_time',
        array('label' => $model->getAttributeLabel('published')
            , 'type' => 'image'
            , 'value' => $model->getPublishedImage()
        ),
        'created',
        'modified',
        array('label' => $model->getAttributeLabel('deleted')
            , 'type' => 'image'
            , 'value' => $model->getDeletedImage()
        ),
        'deleted_date',
    ),
));
?>
