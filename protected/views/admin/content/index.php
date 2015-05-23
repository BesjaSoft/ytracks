<?php
$this->breadcrumbs=array(
	'Contents',
);

$this->menu=array(
	array('label'=>'Create Content','url'=>array('create')),
	array('label'=>'Manage Content','url'=>array('admin')),
);
?>

<h1>Contents</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
