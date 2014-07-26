<?php
$this->breadcrumbs=array(
	'Tprojects',
);

$this->menu=array(
	array('label'=>'Create Tproject', 'url'=>array('create')),
	array('label'=>'Manage Tproject', 'url'=>array('admin')),
);
?>

<h1>Tprojects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
