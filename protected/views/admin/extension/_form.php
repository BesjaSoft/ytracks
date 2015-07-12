<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'extension-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'type',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'element',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'folder',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'client_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'enabled',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'access',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'protected',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'manifest_cache',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaGroup($model,'params',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaGroup($model,'custom_data',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaGroup($model,'system_data',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'checked_out',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'state',array('class'=>'span5')); ?>

	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
