<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'tevent-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => "well form-horizontal")
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'name', array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->textFieldGroup($model, 'country_code', array('class' => 'span5', 'maxlength' => 3)); ?>
<?php echo $form->textAreaGroup($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php
echo $form->dropDownListGroup($model, 'event_id', Event::model()->findList()
        , array('prompt' => '- Select an Event -', 'class' => 'span5'));
?>
<?php echo $form->checkBoxGroup($model, 'done'); ?>

<div class="form-group">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>