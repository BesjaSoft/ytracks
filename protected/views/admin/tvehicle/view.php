<?php
$this->breadcrumbs = array(
    'Tvehicles' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Tvehicle', 'url' => array('index')),
    array('label' => 'Create Tvehicle', 'url' => array('create')),
    array('label' => 'Update Tvehicle', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Tvehicle', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tvehicle', 'url' => array('admin')),
);
?>

<h1>View Tvehicle #<?php echo $model->id; ?></h1>

<?php
if (!empty($model->tvehicle)) {
    $tvehicle = $model->tvehicle;
} else {
    $tvehicle = $model->tmake . ' / ' . $model->ttype;
}
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'label' => 'tvehicle',
            'type' => 'raw',
            'value' => $tvehicle
        ),
        'tengine',
        'tchassis',
        'tlicenseplate',
        array(
            'label' => $model->getAttributeLabel('vehicle_id'),
            'type' => 'raw',
            'value' => (isset($model->make_id) ? CHtml::Link(CHtml::encode($model->make->name), array('make/view', 'id' => $model->make_id)) : '')
                    . ' ' . (isset($model->type_id) ? CHtml::Link(CHtml::encode($model->type->name), array('type/view', 'id' => $model->type_id)) : '')
                    . ' ' . (isset($model->vehicle_id) ? CHtml::Link(CHtml::encode($model->vehicle->chassisnumber), array('vehicle/view', 'id' => $model->vehicle_id)) : '')
        ),
        array(
            'label' => $model->getAttributeLabel('engine_id'),
            'type' => 'raw',
            'value' => !isset($model->engine_id) ? '' :
                    (CHtml::Link(CHtml::encode($model->engine->make->name), array('make/view', 'id' => $model->engine->make_id)
                    ) . ' ' .
                    CHtml::Link(CHtml::encode($model->engine->name), array('engine/view', 'id' => $model->engine_id))
                    )
        ),
        'done',
        'created',
        'modified',
    ),
));
?>


