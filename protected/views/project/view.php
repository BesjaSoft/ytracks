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
$tabs['Details'] = array('label' => 'Details', 'content' => $this->renderPartial('_detail', array('model' => $model), true, false));
$tabs['Rounds'] = array('label' => 'Rounds', 'content' => $this->renderPartial('/round/_rounds', array('model' => $model), true, false), 'active' => true);
$tabs['Participants'] = array('label' => 'Participants', 'content' => $this->renderPartial('/participant/_participants', array('model' => $model), true, false));
$tabs['Rankings'] = array('label' => 'Rankings', 'content' => $this->renderPartial('/ranking/_rankings', array('model' => $model), true, false));
$tabs['Pictures'] = array('label' => 'Pictures', 'content' => $this->renderPartial('/album/_view', array('model' => $model), true, false));

$this->widget('booster.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => $tabs
));
?>
