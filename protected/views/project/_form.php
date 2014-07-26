<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'competition_id'); ?>
		<?php echo $form->dropdownlist($model,'competition_id',Competition::model()->findList()); ?>
		<?php echo $form->error($model,'competition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'season_id'); ?>
		<?php echo $form->dropdownlist($model,'season_id',Season::model()->findList()); ?>
		<?php echo $form->error($model,'season_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_id'); ?>
		<?php echo $form->dropdownlist($model,'admin_id', User::model()->findList()); ?>
		<?php echo $form->error($model,'admin_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'params'); ?>
		<?php echo $form->textArea($model,'params',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'params'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx  ($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error    ($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx ($model,'published'); ?>
		<?php echo $form->checkbox($model,'published'); ?>
		<?php echo $form->error   ($model,'published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->