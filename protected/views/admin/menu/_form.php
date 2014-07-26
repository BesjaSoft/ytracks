<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'menutype'); ?>
		<?php echo $form->textField($model,'menutype',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'menutype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textArea($model,'link',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent'); ?>
		<?php echo $form->textField($model,'parent',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'componentid'); ?>
		<?php echo $form->textField($model,'componentid',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'componentid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sublevel'); ?>
		<?php echo $form->textField($model,'sublevel'); ?>
		<?php echo $form->error($model,'sublevel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
		<?php echo $form->error($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pollid'); ?>
		<?php echo $form->textField($model,'pollid'); ?>
		<?php echo $form->error($model,'pollid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'browserNav'); ?>
		<?php echo $form->textField($model,'browserNav'); ?>
		<?php echo $form->error($model,'browserNav'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'access'); ?>
		<?php echo $form->textField($model,'access'); ?>
		<?php echo $form->error($model,'access'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'utaccess'); ?>
		<?php echo $form->textField($model,'utaccess'); ?>
		<?php echo $form->error($model,'utaccess'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'params'); ?>
		<?php echo $form->textArea($model,'params',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'params'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lft'); ?>
		<?php echo $form->textField($model,'lft',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'lft'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rgt'); ?>
		<?php echo $form->textField($model,'rgt',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'rgt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home'); ?>
		<?php echo $form->textField($model,'home',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'home'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->