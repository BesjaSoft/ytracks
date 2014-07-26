<?php
$this->breadcrumbs=array(
	'Enginetypes',
);

$this->menu=array(
	array('label'=>'Create Enginetype', 'url'=>array('create')),
	array('label'=>'Manage Enginetype', 'url'=>array('admin')),
);
?>

<h1>Enginetypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
