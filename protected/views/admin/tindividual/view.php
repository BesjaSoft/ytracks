<?php
$this->breadcrumbs = array(
    'Tindividuals' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Tindividual', 'url' => array('index')),
    array('label' => 'Create Tindividual', 'url' => array('create')),
    array('label' => 'Update Tindividual', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Tindividual', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Tindividual', 'url' => array('admin')),
    array('label'=>'Export Tindividual','url'=>array('export','id'=>$model->id))
);
?>

<h1>View Tindividual #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView',
        array(
    'data' => $model,
    'attributes' => array(
        'id',
        'content_id',
        'last_name',
        'first_name',
        'full_name',
        'nickname',
        array(
            'name' => 'individual_id',
            'type' => 'raw',
            'value' => CHtml::link(CHtml::encode($model->individual->full_name),
                    array('individual/view', 'id' => $model->individual_id))
        ),
        'height',
        'weight',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'country_of_birth',
        'nationality',
        'date_of_death',
        'place_of_death',
        'country_of_death',
        'picture',
        'address',
        'postcode',
        'city',
        'state',
        'country',
        'description',
        'error',
        'created',
        'modified',
        'deleted',
        'deleted_date',
    ),
));
?>
