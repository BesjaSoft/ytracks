<?php
$this->breadcrumbs = array(
	'Tvehicles',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Tvehicle', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Tvehicle', 'url'=>array('admin')),
);
?>

<h1>Tvehicles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
