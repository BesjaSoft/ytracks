<?php
$this->breadcrumbs = array(
    'Tvehicles' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Tvehicle', 'url' => array('index')),
    array('label' => 'Create Tvehicle', 'url' => array('create')),
    array('label' => 'Update Tvehicle', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Export Tvehicle', 'url' => array('export', 'id' => $model->id)),
    array('label' => 'Delete Tvehicle', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tvehicle', 'url' => array('admin')),
);
?>

<h1>View Tvehicle #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'filename',
        'tmake',
        'ttype',
        'chassis',
        'tengine',
        'year',
        'group',
        'first_owner',
        'next_owners',
        'comment',
        array('name' => 'type_id', 'type' => 'raw', 'value' => CHtml::link(CHtml::encode($model->make->name, array('make/view', 'id' => $model->make_id))) . ' ' . CHtml::link(CHtml::encode($model->type->name), array('type/view', 'id' => $model->type_id))),
        array('name' => 'vehicle_id', 'type' => 'raw', 'value' => CHtml::link(Chtml::encode($model->vehicle->chassisnumber, array('vehicle/view/', 'id' => $model->vehicle_id)))),
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


