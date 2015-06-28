<?php
/* @var $this IndividualReferenceController */
/* @var $model IndividualReference */

$this->breadcrumbs = array(
    'Individual References' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List IndividualReference', 'url' => array('index')),
    array('label' => 'Create IndividualReference', 'url' => array('create')),
    array('label' => 'Update IndividualReference', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete IndividualReference', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage IndividualReference', 'url' => array('admin')),
);
?>

<h1>View IndividualReference #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView',
        array(
    'data' => $model,
    'attributes' => array(
        'id',
        array('label' => $model->getAttributeLabel('individual_id'),
            'type' => 'raw',
            'value' => (isset($model->individual) ? CHtml::Link(CHtml::encode($model->individual->full_name)
                            , array('individual/view', 'id' => $model->individual_id)) : "")
        ),
        array('label' => $model->getAttributeLabel('source_id'),
            'type' => 'raw',
            'value' => (isset($model->source) ? CHtml::Link(CHtml::encode($model->source->title)
                            , array('weblink/view', 'id' => $model->source_id)) : "")
        ),
        'source_reference',
        'full_name',
        'first_name',
        'last_name',
        'createdon',
        'modifiedon',
        'deleted',
        'deletedon',
    ),
));
?>
