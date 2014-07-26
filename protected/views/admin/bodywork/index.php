<?php
$this->breadcrumbs=array(
	'Bodyworks',
);

$this->menu=array(
	array('label'=>'Create Bodywork','url'=>array('create')),
	array('label'=>'Manage Bodywork','url'=>array('admin')),
);
?>

<h1>Bodyworks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
