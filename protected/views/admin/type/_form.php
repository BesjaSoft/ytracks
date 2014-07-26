<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'make_id'); ?>
		<?php echo $form->textField($model,'make_id'); ?>
		<?php echo $form->error($model,'make_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chassiscode'); ?>
		<?php echo $form->textField($model,'chassiscode',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'chassiscode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cartype_id'); ?>
		<?php echo $form->textField($model,'cartype_id'); ?>
		<?php echo $form->error($model,'cartype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'constructor_id'); ?>
		<?php echo $form->textField($model,'constructor_id'); ?>
		<?php echo $form->error($model,'constructor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bodywork_id'); ?>
		<?php echo $form->textField($model,'bodywork_id'); ?>
		<?php echo $form->error($model,'bodywork_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model,'from',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'untill'); ?>
		<?php echo $form->textField($model,'untill',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'untill'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motortype_id'); ?>
		<?php echo $form->textField($model,'motortype_id'); ?>
		<?php echo $form->error($model,'motortype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motorplace_id'); ?>
		<?php echo $form->textField($model,'motorplace_id'); ?>
		<?php echo $form->error($model,'motorplace_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'propulsion_id'); ?>
		<?php echo $form->textField($model,'propulsion_id'); ?>
		<?php echo $form->error($model,'propulsion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'topspeed'); ?>
		<?php echo $form->textField($model,'topspeed'); ?>
		<?php echo $form->error($model,'topspeed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'length'); ?>
		<?php echo $form->textField($model,'length',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'length'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width'); ?>
		<?php echo $form->textField($model,'width',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wheelbase'); ?>
		<?php echo $form->textField($model,'wheelbase',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wheelbase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spoorbreedte_voor'); ?>
		<?php echo $form->textField($model,'spoorbreedte_voor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'spoorbreedte_voor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spoorbreedte_achter'); ?>
		<?php echo $form->textField($model,'spoorbreedte_achter',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'spoorbreedte_achter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'production_number'); ?>
		<?php echo $form->textField($model,'production_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'production_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registered'); ?>
		<?php echo $form->textField($model,'registered'); ?>
		<?php echo $form->error($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out'); ?>
		<?php echo $form->error($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
		<?php echo $form->error($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
		<?php echo $form->error($model,'deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted_date'); ?>
		<?php echo $form->textField($model,'deleted_date'); ?>
		<?php echo $form->error($model,'deleted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->