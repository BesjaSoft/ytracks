<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'country-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'fullname', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldGroup($model, 'iso2', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->textFieldGroup($model, 'iso3', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldGroup($model, 'num', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'itu', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldGroup($model, 'fips', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->textFieldGroup($model, 'ioc', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldGroup($model, 'fifa', array('class' => 'span5', 'maxlength' => 4)); ?>

<?php echo $form->textFieldGroup($model, 'ds', array('class' => 'span5', 'maxlength' => 12)); ?>

<?php echo $form->textFieldGroup($model, 'wmo', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->textFieldGroup($model, 'gaul', array('class' => 'span5', 'maxlength' => 5)); ?>

<?php echo $form->textFieldGroup($model, 'marc', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldGroup($model, 'dial', array('class' => 'span5', 'maxlength' => 5)); ?>

<?php echo $form->textFieldGroup($model, 'remarks', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'ordering', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'checked_out', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'checked_out_time', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'deleted', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'deleted_date', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
