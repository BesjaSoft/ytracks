<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'country-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'fullname',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'iso2',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'iso3',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'num',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'itu',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'fips',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'ioc',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'fifa',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'ds',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'wmo',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'gaul',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'marc',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'dial',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'remarks',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'checked_out',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
