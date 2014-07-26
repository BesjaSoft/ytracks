<?php
$this->breadcrumbs=array(
	'Scales',
);

$this->menu=array(
	array('label'=>'Create Scale', 'url'=>array('create')),
	array('label'=>'Manage Scale', 'url'=>array('admin')),
);
?>

<h1>Scales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
