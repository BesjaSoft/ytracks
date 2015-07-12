<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'ttype-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'content_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'name', array('class' => 'span6', 'maxlength' => 255)); ?>
<?php echo $form->dropDownListGroup($model, 'make_id', Make::model()->findList(), array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'type_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'engine_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'tuner', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'country', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'year', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'engine', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'engine_type', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'cams', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'valves_cyl', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'compression', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'bore', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'stroke', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'capacity_cc', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'power_at_revs', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldGroup($model, 'torque', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'induction', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'ignition', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'fuel_system', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'chassis_type', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'body_type', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldGroup($model, 'designer', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'front_suspension', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'rear_suspension', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'shock_absorbers', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'engine_position', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldGroup($model, 'wheelbase_mm', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'front_track_mm', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'rear_track_mm', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'weight_kg', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'drive', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'number_of_gears', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'gearbox', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'fuel_tank_size_litres', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'brakes', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'front_brake_type', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'rear_brake_type', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'front_rims', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'rear_rims', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'tyres', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'front_tyres', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'rear_tyres', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'maximum_speed_kph', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldGroup($model, 'error', array('class' => 'span5')); ?>

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
