<?php
$this->breadcrumbs=array(
	'Driver Scalemodels',
);

$this->menu=array(
	array('label'=>'Create DriverScalemodel', 'url'=>array('create')),
	array('label'=>'Manage DriverScalemodel', 'url'=>array('admin')),
);
?>

<h1>Driver Scalemodels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
