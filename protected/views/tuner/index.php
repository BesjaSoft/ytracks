<?php
$this->breadcrumbs=array(
	'Tuners',
);

$this->menu=array(
	array('label'=>'Create Tuner','url'=>array('create')),
	array('label'=>'Manage Tuner','url'=>array('admin')),
);
?>

<h1>Tuners</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
