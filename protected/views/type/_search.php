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
		<?php echo $form->label($model,'make_id'); ?>
		<?php echo $form->textField($model,'make_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chassiscode'); ?>
		<?php echo $form->textField($model,'chassiscode',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cartype_id'); ?>
		<?php echo $form->textField($model,'cartype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'constructor_id'); ?>
		<?php echo $form->textField($model,'constructor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bodywork_id'); ?>
		<?php echo $form->textField($model,'bodywork_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from'); ?>
		<?php echo $form->textField($model,'from',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'untill'); ?>
		<?php echo $form->textField($model,'untill',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motortype_id'); ?>
		<?php echo $form->textField($model,'motortype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engineposition_id'); ?>
		<?php echo $form->textField($model,'engineposition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propulsion_id'); ?>
		<?php echo $form->textField($model,'propulsion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'topspeed'); ?>
		<?php echo $form->textField($model,'topspeed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'length'); ?>
		<?php echo $form->textField($model,'length',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width'); ?>
		<?php echo $form->textField($model,'width',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wheelbase'); ?>
		<?php echo $form->textField($model,'wheelbase',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spoorbreedte_voor'); ?>
		<?php echo $form->textField($model,'spoorbreedte_voor',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spoorbreedte_achter'); ?>
		<?php echo $form->textField($model,'spoorbreedte_achter',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_number'); ?>
		<?php echo $form->textField($model,'production_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registered'); ?>
		<?php echo $form->textField($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
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