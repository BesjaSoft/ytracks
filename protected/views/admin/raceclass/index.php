<?php
$this->breadcrumbs=array(
	'Raceclasses',
);

$this->menu=array(
	array('label'=>'Create Raceclass', 'url'=>array('create')),
	array('label'=>'Manage Raceclass', 'url'=>array('admin')),
);
?>

<h1>Raceclasses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
