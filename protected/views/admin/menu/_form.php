<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'menutype',array('class'=>'span5','maxlength'=>24)); ?>

	<?php echo $form->textFieldGroup($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldGroup($model,'alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldGroup($model,'note',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldGroup($model,'path',array('class'=>'span5','maxlength'=>1024)); ?>

	<?php echo $form->textFieldGroup($model,'link',array('class'=>'span5','maxlength'=>1024)); ?>

	<?php echo $form->textFieldGroup($model,'type',array('class'=>'span5','maxlength'=>16)); ?>

	<?php echo $form->textFieldGroup($model,'published',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'parent_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'level',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'component_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'checked_out',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'browserNav',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'access',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'img',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldGroup($model,'template_style_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaGroup($model,'params',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'lft',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'rgt',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'home',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'language',array('class'=>'span5','maxlength'=>7)); ?>

	<?php echo $form->textFieldGroup($model,'client_id',array('class'=>'span5')); ?>

	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
