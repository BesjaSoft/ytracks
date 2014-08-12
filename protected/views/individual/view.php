<?php
$this->breadcrumbs = array(
    'Individuals' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Individual', 'url' => array('index')),
    array('label' => 'Twin or Double', 'url' => array('twinordouble')),    
    array('label' => 'Create Individual', 'url' => array('create')),
    array('label' => 'Update Individual', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Individual', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Individual', 'url' => array('admin')),
);
?>

<h1><?php echo $model->full_name; ?></h1>

<?php
$tabs = array();
$tabs['Details'] = $this->renderPartial('_detail', array('model' => $model), true, true);
$tabs['Rankings'] = $this->renderPartial('/ranking/_rankings', array('model' => $model), true, true);
$tabs['Results'] = $this->renderPartial('/result/_results', array('model' => $model), true, true);
$tabs['Owners'] = $this->renderPartial('/owner/_owners', array('model' => $model), true, true);
$tabs['Participant'] = $this->renderPartial('/participant/_participants', array('model' => $model), true, true);
$tabs['Pictures'] = $this->renderPartial('/album/_view', array('model' => $model), true, true);

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $tabs,
        /* 'options' => array(
          'collapsible' => false,
          'selected' => $tab,
          'height' => '100px',
          'id' => 'garage-detail'
          ), */
));
?>
