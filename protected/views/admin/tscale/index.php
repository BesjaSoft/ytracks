<?php
$this->breadcrumbs = array(
	'Tscales',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Tscale', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Tscale', 'url'=>array('admin')),
);
?>

<h1>Tscales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
