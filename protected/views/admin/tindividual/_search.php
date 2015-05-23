<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'content_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'last_name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'first_name',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldGroup($model,'full_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'nickname',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'weight',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'gender',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldGroup($model,'date_of_birth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'place_of_birth',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'country_of_birth',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldGroup($model,'nationality',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldGroup($model,'date_of_death',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'place_of_death',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'country_of_death',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldGroup($model,'picture',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaGroup($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'postcode',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldGroup($model,'city',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'state',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'country',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textAreaGroup($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'error',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'deleted',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'deleted_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
