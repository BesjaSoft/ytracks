<?php
$this->breadcrumbs=array(
	'Subroundtypes',
);

$this->menu=array(
	array('label'=>'Create Subroundtype', 'url'=>array('create')),
	array('label'=>'Manage Subroundtype', 'url'=>array('admin')),
);
?>

<h1>Subroundtypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
