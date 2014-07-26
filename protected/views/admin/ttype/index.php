<?php
$this->breadcrumbs=array(
	'Ttypes',
);

$this->menu=array(
	array('label'=>'Create Ttype','url'=>array('create')),
	array('label'=>'Manage Ttype','url'=>array('admin')),
);
?>

<h1>Ttypes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
