<?php
$this->breadcrumbs=array(
	'Tchassises',
);

$this->menu=array(
	array('label'=>'Create Tchassis','url'=>array('create')),
	array('label'=>'Manage Tchassis','url'=>array('admin')),
);
?>

<h1>Tchassises</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
