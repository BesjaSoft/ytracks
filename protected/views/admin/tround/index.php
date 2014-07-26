<?php
$this->breadcrumbs=array(
	'Trounds',
);

$this->menu=array(
	array('label'=>'Create Tround', 'url'=>array('create')),
	array('label'=>'Manage Tround', 'url'=>array('admin')),
);
?>

<h1>Trounds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
