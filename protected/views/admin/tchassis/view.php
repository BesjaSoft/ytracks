<?php
$this->breadcrumbs = array(
    'Tchassises' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Tchassis', 'url' => array('index')),
    array('label' => 'Create Tchassis', 'url' => array('create')),
    array('label' => 'Update Tchassis', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Tchassis', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tchassis', 'url' => array('admin')),
);
?>

<h1>View Tchassis #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'filename',
        'tmake',
        'ttype',
        'chassis',
        'tengine',
        'tengine_number',
        'year',
        'group',
        'first_owner',
        'next_owners',
        'original_color',
        'original_registration_number',
        'later_registration_numbers',
        'competition_appearances',
        'comment',
        $this->showMakeDetail($model),
        $this->showTypeDetail($model),
        'vehicle_id',
        'engine_id',
        'published',
        'done',
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
