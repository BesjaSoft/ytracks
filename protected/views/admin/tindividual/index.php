<?php
$this->breadcrumbs=array(
	'Tindividuals',
);

$this->menu=array(
	array('label'=>'Create Tindividual','url'=>array('create')),
	array('label'=>'Manage Tindividual','url'=>array('admin')),
);
?>

<h1>Tindividuals</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
