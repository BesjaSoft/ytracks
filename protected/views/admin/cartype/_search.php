<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldGroup($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldGroup($model,'alias',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaGroup($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldGroup($model,'from',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldGroup($model,'untill',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldGroup($model,'published',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'checked_out',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'checked_out_time',array('class'=>'span5')); ?>

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
