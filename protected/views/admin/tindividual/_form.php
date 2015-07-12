<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'individual-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
            ));
    ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'content_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'last_name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldGroup($model,'first_name',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldGroup($model,'full_name',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="control-group">
        <?php echo $form->hiddenField( $model, 'individual_id');?>
        <?php echo $form->labelEx($model,'individual_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                               , array( 'id'      => 'individual_id'
                                      , 'name'    => 'individual_id'
                                      , 'value'   => isset($model->individual_id) ? $model->individual->full_name : $model->individual_id
                                      , 'source'  => $this->createUrl('individual/autoComplete')
                                      , 'options' => array( 'showAnim'  => 'fold'
                                                          , 'minLength' => 3
                                                          , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Tindividual_individual_id").val($selectedObject.id);}'
                                                          )
                                      )
                               );?>
            <?php echo $form->error($model,'individual_id'); ?>
        </div>
	</div>

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

	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>