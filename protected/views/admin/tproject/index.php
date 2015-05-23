<?php
$this->breadcrumbs=array(
	'Tprojects',
);

$this->menu=array(
	array('label'=>'Create Tproject','url'=>array('create')),
	array('label'=>'Manage Tproject','url'=>array('admin')),
);
?>

<h1>Tprojects</h1>

<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
