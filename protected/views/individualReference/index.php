<?php
$this->breadcrumbs=array(
	'Individual References',
);

$this->menu=array(
	array('label'=>'Create IndividualReference','url'=>array('create')),
	array('label'=>'Manage IndividualReference','url'=>array('admin')),
);
?>

<h1>Individual References</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
