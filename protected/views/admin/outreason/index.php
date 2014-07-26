<?php
$this->breadcrumbs=array(
	'Outreasons',
);

$this->menu=array(
	array('label'=>'Create Outreason', 'url'=>array('create')),
	array('label'=>'Manage Outreason', 'url'=>array('admin')),
);
?>

<h1>Outreasons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
