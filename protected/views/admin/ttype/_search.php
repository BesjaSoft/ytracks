<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'content_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'make_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'type_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'engine_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'tuner', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'country', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'year', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'engine', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'engine_type', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'cams', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'valves_cyl', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'compression', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'bore', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'stroke', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'capacity_cc', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'power_at_revs', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'torque', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'induction', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'ignition', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'fuel_system', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'chassis_type', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'body_type', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'designer', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'front_suspension', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'rear_suspension', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'shock_absorbers', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'engine_position', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'wheelbase_mm', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'front_track_mm', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'rear_track_mm', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'weight_kg', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'drive', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'number_of_gears', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'gearbox', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'fuel_tank_size_litres', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'brakes', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'front_brake_type', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'rear_brake_type', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'front_rims', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'rear_rims', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'tyres', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'front_tyres', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'rear_tyres', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'maximum_speed_kph', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'error', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'deleted', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'deleted_date', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
