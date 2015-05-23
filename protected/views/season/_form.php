<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'season-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'name', array('class' => 'span5', 'maxlength' => 40)); ?>
<?php echo $form->textFieldGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldGroup($model, 'ordering', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'checked_out', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'checked_out_time', array('class' => 'span5')); ?>
<?php echo $form->checkBoxGroup($model, 'published'); ?>

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
