<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unit-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal'
        ));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'domain', array('class' => 'span5', 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'code', array('class' => 'span5', 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'description', array('class' => 'span5', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldGroup($model, 'published', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'ordering', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'checked_out', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'checked_out_time', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'created', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'modified', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'deleted', array('class' => 'span5')); ?>
    <?php echo $form->textFieldGroup($model, 'delete_date', array('class' => 'span5')); ?>

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
