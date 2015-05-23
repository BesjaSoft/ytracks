<?php
$this->breadcrumbs=array(
	'Seasons',
);

$this->menu=array(
	array('label'=>'Create Season','url'=>array('create')),
	array('label'=>'Manage Season','url'=>array('admin')),
);
?>

<h1>Seasons</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
