<?php
$this->breadcrumbs = array(
    'Makes',
);

$this->menu = array(
    array('label' => 'Create Make', 'url' => array('create')),
    array('label' => 'Manage Make', 'url' => array('admin')),
);
?>

<h1>Makes</h1>

<?php
$this->widget('ApListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => "{summary}\n{alphapager}\n{pager}\n{items}",
));
?>
