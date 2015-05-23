<div class="wide form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'subroundtype-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'points'); ?>
		<?php echo $form->textField($model,'points',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'points'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countpoints'); ?>
		<?php echo $form->checkBox($model,'countpoints'); ?>
		<?php echo $form->error($model,'countpoints'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manche'); ?>
		<?php echo $form->checkBox($model,'manche'); ?>
		<?php echo $form->error($model,'manche'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fastest_lap'); ?>
		<?php echo $form->checkBox($model,'fastest_lap'); ?>
		<?php echo $form->error($model,'fastest_lap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pole_position'); ?>
		<?php echo $form->checkBox($model,'pole_position'); ?>
		<?php echo $form->error($model,'pole_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->