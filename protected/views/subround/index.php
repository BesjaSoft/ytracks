<?php
$this->breadcrumbs=array(
	'Subrounds',
);

$this->menu=array(
	array('label'=>'Create Subround', 'url'=>array('create')),
	array('label'=>'Manage Subround', 'url'=>array('admin')),
);
?>

<h1>Subrounds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
