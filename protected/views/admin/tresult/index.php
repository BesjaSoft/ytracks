<?php
$this->breadcrumbs = array(
	'Tresults',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Tresult', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Tresult', 'url'=>array('admin')),
);
?>

<h1>Tresults</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
