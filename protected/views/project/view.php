<?php
$this->breadcrumbs = array(
    'Projects' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Project', 'url' => array('index')),
    array('label' => 'Create Project', 'url' => array('create')),
    array('label' => 'Update Project', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Project', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Project', 'url' => array('admin')),
);
?>

<h1>View Project #<?php echo $model->id; ?></h1>

<?php
// build the tabs for the view
$tabs = array();
$tabs['Details'] = $this->renderPartial('_detail', array('model' => $model), true, false);
$tabs['Rounds'] = $this->renderPartial('/round/_rounds', array('model' => $model), true, false);
$tabs['Participants'] = $this->renderPartial('/participant/_participants', array('model' => $model), true, false);
$tabs['Rankings'] = $this->renderPartial('/ranking/_rankings', array('model' => $model), true, false);
$tabs['Pictures'] = $this->renderPartial('/album/_view', array('model' => $model), true, false);

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $tabs,
    'options' => array(
        'collapsible' => false,
        'selected' => '1',
        'id' => 'project-rounds'
    ),
));
?>
