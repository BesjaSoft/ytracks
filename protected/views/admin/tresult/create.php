<?php
$this->breadcrumbs=array(
	'Tresults'=>array(Yii::t('app', 'admin')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>'List Tresult', 'url'=>array('index')),
	array('label'=>'Manage Tresult', 'url'=>array('admin')),
);
?>

<h1> Create Tresult </h1>
<div class="wide form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'tresult-form',
	'enableAjaxValidation'=>true,
));
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('app', 'Create')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
