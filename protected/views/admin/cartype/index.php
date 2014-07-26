<?php
$this->breadcrumbs=array(
	'Cartypes',
);

$this->menu=array(
	array('label'=>'Create Cartype','url'=>array('create')),
	array('label'=>'Manage Cartype','url'=>array('admin')),
);
?>

<h1>Cartypes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
