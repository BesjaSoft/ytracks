<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php
echo $form->textFieldGroup($model, 'tvehicle', array(
    'size' => 60,
    'maxlength' => 255));
?>
<?php
echo $form->textFieldGroup($model, 'tengine', array(
    'size' => 60,
    'maxlength' => 255));
?>
<?php
echo $form->textFieldGroup($model, 'tchassis', array(
    'size' => 50,
    'maxlength' => 50));
?>
<?php
echo $form->textFieldGroup($model, 'tlicenseplate', array(
    'size' => 50,
    'maxlength' => 50));
?>

<?php
echo $form->dropDownListGroup($model, 'make_id',
        array(
    'widgetOptions' => array(
        'data' => Make::model()->findList(),
        'prompt' => '-- Make --',
        'htmlOptions' => array(
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->baseUrl . '/index.php?r=admin/tvehicle/gettypes', //url to call
                'update' => '#Tvehicle_type_id' //selector to update
)))));
?>

<?php
echo $form->dropDownListGroup($model, 'type_id',
        array(
    'widgetOptions' => array(
        'data' => Type::model()->findList('make_id = :make', array(':make' => $model->make_id)),
        'prompt' => '-- Type --',
        'htmlOptions' => array(
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->baseUrl . '/index.php?r=admin/tvehicle/getvehicles', //url to call
                'update' => '#Tvehicle_vehicle_id' //selector to update
)))));
?>

<?php
echo $form->dropDownListGroup($model, 'vehicle_id',
        array(
    'widgetOptions' => array(
        'data' => Vehicle::model()->findList('type_id = :type', array(
            ':type' => $model->type_id)),
        'prompt' => '-- Vehicle --'
)));
echo $form->dropDownListGroup($model, 'engine_id',
        array(
    'widgetOptions' => array(
        'data' => Engine::model()->findList(),
        'prompt' => '-- Engine --')));
?>