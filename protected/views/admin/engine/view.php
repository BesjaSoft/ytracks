<?php
$this->breadcrumbs = array(
    'Engines' => array('index'),
    $model->getFullname(),
);

$this->menu = array(
    array('label' => 'List Engine', 'url' => array('index')),
    array('label' => 'Create Engine', 'url' => array('create')),
    array('label' => 'Update Engine', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Engine', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Engine', 'url' => array('admin')),
);
?>

<h1>View Engine #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView',
        array(
    'data' => $model,
    'attributes' => array(
        'id',
        array('label' => $model->getAttributeLabel('make_id'),
            'type' => 'raw',
            'value' => CHtml::Link(CHtml::encode($model->make->name)
                    , array('make/view', 'id' => $model->make_id)
            )
        ),
        'name',
        'alias',
        'description',
        'code',
        array('label' => $model->getAttributeLabel('parent_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->parent->getFullname())
                    , array('parent/view', 'id' => $model->parent_id)
            )
        ),
        array('label' => $model->getAttributeLabel('tuner_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->tuner->name)
                    , array('tuner/view', 'id' => $model->tuner_id)
            )
        ),
        array('label' => $model->getAttributeLabel('enginetype_id')
            , 'type' => 'raw'
            , 'value' => CHtml::Link(CHtml::encode($model->enginetype->name)
                    , array('enginetype/view', 'id' => $model->enginetype_id)
            )
        ),
        'compression',
        array('label' => $model->getAttributeLabel('published')
            , 'type' => 'raw'
            , 'value' => $model->getPublishedImage()
        ),
        'ordering',
        'checked_out',
        'checked_out_time',
        'created',
        'modified',
        array('label' => $model->getAttributeLabel('deleted')
            , 'type' => 'raw'
            , 'value' => $model->getDeletedImage()
        ),
        'deleted_date',
    ),
));
?>
