<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'participant_id'); ?>
		<?php echo $form->textField($model,'participant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'individual_id'); ?>
		<?php echo $form->textField($model,'individual_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_id'); ?>
		<?php echo $form->textField($model,'team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subround_id'); ?>
		<?php echo $form->textField($model,'subround_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raceclass_id'); ?>
		<?php echo $form->textField($model,'raceclass_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rank'); ?>
		<?php echo $form->textField($model,'rank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'performance'); ?>
		<?php echo $form->textField($model,'performance',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'laps'); ?>
		<?php echo $form->textField($model,'laps'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bonus_points'); ?>
		<?php echo $form->textField($model,'bonus_points'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shared_drive'); ?>
		<?php echo $form->textField($model,'shared_drive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'make_id'); ?>
		<?php echo $form->textField($model,'make_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_id'); ?>
		<?php echo $form->textField($model,'vehicle_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engine_id'); ?>
		<?php echo $form->textField($model,'engine_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tyre_id'); ?>
		<?php echo $form->textField($model,'tyre_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'outreason_id'); ?>
		<?php echo $form->textField($model,'outreason_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tresult_id'); ?>
		<?php echo $form->textField($model,'tresult_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deleted_date'); ?>
		<?php echo $form->textField($model,'deleted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->