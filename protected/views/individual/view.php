<?php
$this->setPageTitle($model->full_name . ' - yTracks');
$this->breadcrumbs = array(
    'Individuals' => array('index'),
    $model->id,
);
$this->menu = array(
    array('label' => 'List Individual', 'url' => array('index')),
    array('label' => 'Twin or Double', 'url' => array('twinordouble')),
    array('label' => 'Create Individual', 'url' => array('create')),
    array('label' => 'Update Individual', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Individual', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Individual', 'url' => array('admin')),
);
?>


<h1><?php echo $model->full_name; ?></h1>

<?php
$tabs = array();
$tabs['Details'] = array('id' => 'individual-details', 'label' => 'Details', 'content' => $this->renderPartial('_detail',
            array('model' => $model), true, true), 'active' => true);
$tabs['Rankings'] = array('id' => 'individual-rankings', 'label' => 'Rankings', 'content' => $this->renderPartial('/ranking/_rankings',
            array('model' => $model), true, true));
$tabs['Results'] = array('id' => 'individual-results', 'label' => 'Results', 'content' => $this->renderPartial('/result/_results',
            array('model' => $model), true, true));
$tabs['Owners'] = array('id' => 'individual-owners', 'label' => 'Owns', 'content' => $this->renderPartial('/owner/_owners',
            array('model' => $model), true, true));
$tabs['Participant'] = array('id' => 'individual-participants', 'label' => 'Participant', 'content' => $this->renderPartial('/participant/_participants',
            array('model' => $model), true, true));
$tabs['Pictures'] = array('id' => 'individual-pictures', 'label' => 'Pictures', 'content' => $this->renderPartial('/album/_view',
            array('model' => $model), true, true));

$this->widget('booster.widgets.TbTabs',
        array(
    'type' => 'tabs',
    'tabs' => $tabs,
    'htmlOptions' => array(
        'id' => 'individual-view'
    ),
));
?>
