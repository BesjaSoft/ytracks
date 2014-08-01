<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'extension-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'element',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'folder',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'client_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'enabled',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'access',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'protected',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'manifest_cache',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'params',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'custom_data',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'system_data',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'checked_out',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
