<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'content_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'date_of_birth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'place_of_birth',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'country_of_birth',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'nationality',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'date_of_death',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'place_of_death',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'country_of_death',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'picture',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'postcode',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'error',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
