<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'asset_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldGroup($model,'alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaGroup($model,'introtext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaGroup($model,'fulltext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'state',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'catid',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'created_by',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'created_by_alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldGroup($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'modified_by',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'checked_out',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'publish_up',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'publish_down',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'images',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaGroup($model,'urls',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'attribs',array('class'=>'span5','maxlength'=>5120)); ?>

	<?php echo $form->textFieldGroup($model,'version',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textAreaGroup($model,'metakey',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaGroup($model,'metadesc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'access',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'hits',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaGroup($model,'metadata',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'featured',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'language',array('class'=>'span5','maxlength'=>7)); ?>

	<?php echo $form->textFieldGroup($model,'xreference',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'old_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
