<?php
$this->breadcrumbs=array(
	'Scalemodels',
);

$this->menu=array(
	array('label'=>'Create Scalemodel','url'=>array('create')),
	array('label'=>'Manage Scalemodel','url'=>array('admin')),
);
?>

<h1>Scalemodels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
