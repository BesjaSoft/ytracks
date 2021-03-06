<?php
$this->setPageTitle($model->fullname . ' - yTracks');
$this->breadcrumbs = array(
    'Engines' => array('index'),
    $model->name,
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

<h1>Engine #<?php echo $model->fullname; ?></h1>

<?php
$attributes[] = 'id';
$attributes[] = array('name' => 'make_id', 'type' => 'raw', 'value' => CHtml::Link(CHtml::encode($model->make->name),
            array('make/view', 'id' => $model->make_id)));
$attributes[] = 'name';
$attributes[] = 'alias';
$attributes[] = 'description';
$attributes[] = 'code';
//
if (!empty($model->parent_id)) {
    $attributes[] = array('label' => $model->getAttributeLabel('parent_id'),
        'type' => 'raw',
        'value' => CHtml::Link(CHtml::encode($model->parent->fullname),
                array('parent/view', 'id' => $model->parent_id)
        )
    );
}
$attributes[] = array('name' => 'tuner_id', 'type' => 'raw', 'value' => isset($model->tuner_id) ? CHtml::Link(CHtml::encode($model->tuner->name),
                    array('tuner/view', 'id' => $model->tuner_id)) : $model->tuner_id);
$attributes[] = array('name' => 'enginetype_id', 'type' => 'raw', 'value' => isset($model->enginetype_id) ? CHtml::Link(CHtml::encode($model->enginetype->name),
                    array('enginetype/view', 'id' => $model->enginetype_id)) : $model->enginetype_id);
$attributes[] = 'compression';
$attributes[] = 'cams';
$attributes[] = 'valves_cylinder';
$attributes[] = 'bore';
$attributes[] = 'stroke';
$attributes[] = array('name' => 'capacity', 'type' => 'raw', 'value' => isset($model->capacity_id) ? CHtml::encode($model->capacity . ' ' . $model->capacityUnit->code) : $model->capacity_id);
$attributes[] = array('name' => 'power', 'type' => 'raw', 'value' => isset($model->power_id) ? CHtml::encode($model->power . ' ' . $model->powerUnit->code . ' at ' . $model->power_revs . ' revs') : $model->power_id);
$attributes[] = array('name' => 'torque', 'type' => 'raw', 'value' => isset($model->torque_id) ? CHtml::encode($model->torque . ' ' . $model->torqueUnit->code . ' at ' . $model->torque_revs . ' revs') : $model->torque_id);
$attributes[] = 'induction';
$attributes[] = 'ignition_id';
$attributes[] = 'fuelsystem_id';
$attributes[] = array('name' => 'published', 'type' => 'raw', 'value' => $model->getPublishedImage());
$attributes[] = 'ordering';
$attributes[] = 'checked_out';
$attributes[] = 'checked_out_time';
$attributes[] = 'created';
$attributes[] = 'modified';
$attributes[] = array('name' => 'deleted', 'type' => 'raw', 'value' => $model->getDeletedImage());
$attributes[] = 'deleted_date';

$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => $attributes
));
?>
