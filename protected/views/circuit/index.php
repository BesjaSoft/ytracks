<?php
$this->breadcrumbs=array(
	'Circuits',
);

$this->menu=array(
	array('label'=>'Create Circuit', 'url'=>array('create')),
	array('label'=>'Manage Circuit', 'url'=>array('admin')),
);
?>

<h1>Circuits</h1>

<?php
$this->widget('ApListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => "{summary}\n{alphapager}\n{pager}\n{items}",
));
?>
