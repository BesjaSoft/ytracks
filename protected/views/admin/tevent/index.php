<?php
$this->breadcrumbs=array(
	'Tevents',
);

$this->menu=array(
	array('label'=>'Create Tevent','url'=>array('create')),
	array('label'=>'Manage Tevent','url'=>array('admin')),
);
?>

<h1>Tevents</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
