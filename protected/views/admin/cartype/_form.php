<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cartype-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal'
        ));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 100)); ?>
    <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
    <?php echo $form->textFieldRow($model, 'from', array('maxlength' => 4)); ?>
    <?php echo $form->textFieldRow($model, 'untill', array('maxlength' => 4)); ?>
    <?php echo $form->checkBoxRow($model, 'published'); ?>
    <?php echo $form->textFieldRow($model, 'ordering', array('class' => 'span5')); ?>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'inverse',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>
