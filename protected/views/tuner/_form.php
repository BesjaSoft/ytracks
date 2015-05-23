<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tuner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldGroup($model,'published',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'checked_out',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'deleted',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'deleted_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
