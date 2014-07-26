<?php
$this->breadcrumbs=array(
	'Modeltypes',
);

$this->menu=array(
	array('label'=>'Create Modeltype', 'url'=>array('create')),
	array('label'=>'Manage Modeltype', 'url'=>array('admin')),
);
?>

<h1>Modeltypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
