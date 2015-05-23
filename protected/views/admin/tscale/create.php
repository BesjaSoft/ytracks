<?php
$this->breadcrumbs=array(
	'Tscales'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>'List Tscale', 'url'=>array('index')),
	array('label'=>'Manage Tscale', 'url'=>array('admin')),
);
?>

<h1> Create Tscale </h1>
<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'tscale-form',
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
