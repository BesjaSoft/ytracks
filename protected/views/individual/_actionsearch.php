<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',
    	'action'=>Yii::app()->createUrl('individual/admin/'),
        'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($this->searchModel,'first_name'); ?>
		<?php echo $form->textField($this->searchModel,'first_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($this->searchModel,'last_name'); ?>
		<?php echo $form->textField($this->searchModel,'last_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- search-form -->