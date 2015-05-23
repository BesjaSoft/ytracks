<div class="wide form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'owner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_id'); ?>
		<?php echo $form->textField($model,'vehicle_id'); ?>
		<?php echo $form->error($model,'vehicle_id'); ?>
	</div>

	<div class="row">
        <?php echo $form->hiddenField( $model, 'individual_id');?>
        <?php echo $form->labelEx    ( $model, 'individual_id'); ?>

        <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                           , array( 'id'      => 'individual_id'
                                  , 'name'    => 'individual_id'
                                  , 'value'   => $model->individual->full_name
                                  , 'source'  => $this->createUrl('individual/autoComplete')
                                  , 'options' => array( 'showAnim'  => 'fold'
                                                      , 'minLength' => 3
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Owner_individual_id").val($selectedObject.id);}'
                                                      )
                                  )
                           );?>

        <?php echo $form->error($model,'individual_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_id'); ?>
		<?php echo $form->textField($model,'team_id'); ?>
		<?php echo $form->error($model,'team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model,'from'); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'untill'); ?>
		<?php echo $form->textField($model,'untill'); ?>
		<?php echo $form->error($model,'untill'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current'); ?>
		<?php echo $form->textField($model,'current'); ?>
		<?php echo $form->error($model,'current'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out'); ?>
		<?php echo $form->error($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
		<?php echo $form->error($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
		<?php echo $form->error($model,'deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted_date'); ?>
		<?php echo $form->textField($model,'deleted_date'); ?>
		<?php echo $form->error($model,'deleted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->