<?php
/* @var $this IndividualReferenceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Individual References',
);

$this->menu=array(
	array('label'=>'Create IndividualReference', 'url'=>array('create')),
	array('label'=>'Manage IndividualReference', 'url'=>array('admin')),
);
?>

<h1>Individual References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
