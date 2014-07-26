<?php
$this->breadcrumbs=array(
	'Engines',
);

$this->menu=array(
	array('label'=>'Create Engine', 'url'=>array('create')),
	array('label'=>'Manage Engine', 'url'=>array('admin')),
);
?>

<h1>Engines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
