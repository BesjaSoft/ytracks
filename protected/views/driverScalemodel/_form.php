<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'driver-scalemodel-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'individual_id'); ?>
		<?php echo $form->textField($model,'individual_id'); ?>
		<?php echo $form->error($model,'individual_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scalemodel_id'); ?>
		<?php echo $form->textField($model,'scalemodel_id'); ?>
		<?php echo $form->error($model,'scalemodel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
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