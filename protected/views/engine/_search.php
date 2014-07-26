<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'make_id'); ?>
		<?php echo $form->textField($model,'make_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tuner_id'); ?>
		<?php echo $form->textField($model,'tuner_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enginetype_id'); ?>
		<?php echo $form->textField($model,'enginetype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'compression'); ?>
		<?php echo $form->textField($model,'compression',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cams'); ?>
		<?php echo $form->textField($model,'cams'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valves_cylinder'); ?>
		<?php echo $form->textField($model,'valves_cylinder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bore'); ?>
		<?php echo $form->textField($model,'bore',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stroke'); ?>
		<?php echo $form->textField($model,'stroke',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacity'); ?>
		<?php echo $form->textField($model,'capacity',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacity_id'); ?>
		<?php echo $form->textField($model,'capacity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'power'); ?>
		<?php echo $form->textField($model,'power',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'power_id'); ?>
		<?php echo $form->textField($model,'power_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'power_revs'); ?>
		<?php echo $form->textField($model,'power_revs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'torque'); ?>
		<?php echo $form->textField($model,'torque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'torque_id'); ?>
		<?php echo $form->textField($model,'torque_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'torque_revs'); ?>
		<?php echo $form->textField($model,'torque_revs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'induction'); ?>
		<?php echo $form->textField($model,'induction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ignition_id'); ?>
		<?php echo $form->textField($model,'ignition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuelsystem_id'); ?>
		<?php echo $form->textField($model,'fuelsystem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deleted_date'); ?>
		<?php echo $form->textField($model,'deleted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->