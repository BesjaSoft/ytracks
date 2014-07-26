<?php
$this->breadcrumbs=array(
	'Individuals',
);

$this->menu=array(
	array('label'=>'Create Individual', 'url'=>array('create')),
	array('label'=>'Manage Individual', 'url'=>array('admin')),
    array('label'=>'Twin Or Doubles', 'url'=>array('twinordoubles')),
);
?>

<h1>Individuals</h1>

<?php $this->widget('ApListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{summary}\n{alphapager}\n{pager}\n{items}",
));
?>
