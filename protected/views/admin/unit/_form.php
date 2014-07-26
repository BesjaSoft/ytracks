<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'unit-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal'
        ));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'domain', array('class' => 'span5', 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'description', array('class' => 'span5', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($model, 'published', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'ordering', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'checked_out', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'checked_out_time', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'created', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'modified', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'deleted', array('class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'delete_date', array('class' => 'span5')); ?>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>
