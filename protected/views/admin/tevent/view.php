<?php
$this->breadcrumbs = array(
    'Tevents' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Tevent', 'url' => array('index')),
    array('label' => 'Create Tevent', 'url' => array('create')),
    array('label' => 'Update Tevent', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Tevent', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tevent', 'url' => array('admin')),
);
?>

<h1>View Tevent #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'country_code',
        'description',
        $this->ShowEventDetail($model),
        'done',
        'created',
        'modified',
        'deleted',
        'deleted_date',
    ),
));
?>
