<?php
$this->setPageTitle($model->type->make->name . ' ' . $model->type->name . ' <div class=\'chassisnumber\'>' . $model->chassisnumber . '</div> - yTracks');
$this->breadcrumbs = $model->getBreadcrumbs();

$this->menu = array(
    array('label' => 'List Vehicle', 'url' => array('index')),
    array('label' => 'Create Vehicle', 'url' => array('create')),
    array('label' => 'Update Vehicle', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Vehicle', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Vehicle', 'url' => array('admin')),
);
?>

<h1>Vehicle 
    <?php echo $model->type->make->name . ' ' . $model->type->name . ' <div class=\'chassisnumber\'>' . $model->chassisnumber . '</div>'; ?></h1>

<?php
$tabs = array();
$tabs['Details'] = $this->renderPartial('_detail', array('model' => $model), true, false);
$tabs['Results'] = $this->renderPartial('/result/_results', array('model' => $model), true, false);
$tabs['Owners'] = $this->renderPartial('/owner/_owners', array('model' => $model), true, false);
$tabs['Pictures'] = $this->renderPartial('/album/_view', array('model' => $model), true, false);

$this->widget
        ('zii.widgets.jui.CJuiTabs'
        , array('tabs' => $tabs)
);
?>
