<?php
$this->breadcrumbs = array(
    'Cartypes' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Cartype', 'url' => array('index')),
    array('label' => 'Create Cartype', 'url' => array('create')),
    array('label' => 'Update Cartype', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Cartype', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Cartype', 'url' => array('admin')),
);
?>

<h1>View Cartype #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'description',
        'from',
        'untill',
        array('name' => 'published',
            'type' => 'image',
            'value' => $model->getPublishedImage()
        ),
        'ordering',
    ),
));
?>
