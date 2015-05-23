<?php
$this->breadcrumbs = array(
    'Scalemodels' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Scalemodel', 'url' => array('index')),
    array('label' => 'Create Scalemodel', 'url' => array('create')),
    array('label' => 'Update Scalemodel', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Scalemodel', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Scalemodel', 'url' => array('admin')),
);
?>

<h1>Scalemodel 
    <?php
    echo
    CHtml::Link(CHtml::encode($model->make->name), array('make/view', 'id' => $model->make_id))
    . ' - ' .
    CHtml::Link(CHtml::encode($model->type->fullname), array('type/view', 'id' => $model->type_id));
    ?>
</h1>

<?php
$tabs = array();
$tabs['Overview'] = $this->renderPartial('_overview', array('model' => $model), true, false);
$tabs['Pictures'] = $this->renderPartial('/album/_view', array('model' => $model), true, false);
$tabs['Details'] = $this->renderPartial('_detail', array('model' => $model), true, false);

$this->widget('zii.widgets.jui.CJuiTabs',
        array('tabs' => $tabs,
    'id' => 'scalemodel-tabs',
    'options' => array()
        )
);
?>