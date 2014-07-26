<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'tvehicle', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'tmake', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'ttype', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'tchassis', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->textFieldRow($model, 'tlicenseplate', array('size' => 50, 'maxlength' => 50)); ?>

<?php
echo $form->dropDownListRow($model
        , 'make_id'
        , Make::model()->findList()
        , array('prompt' => 'Select a Make..'
    , 'ajax' => array('type' => 'POST' //request type
        , 'url' => Yii::app()->baseUrl . '/index.php?r=admin/tvehicle/gettypes' //url to call
        , 'update' => '#Tvehicle_type_id' //selector to update
    )
        )
);
?>

<?php
echo $form->dropDownListRow($model
        , 'type_id'
        , Type::model()->findList('make_id = :make', array(':make' => $model->make_id))
        , array('prompt' => 'Select a Type'
    , 'ajax' => array('type' => 'POST' //request type
        , 'url' => Yii::app()->baseUrl . '/index.php?r=admin/tvehicle/getvehicles' //url to call
        , 'update' => '#Tvehicle_vehicle_id' //selector to update
    )
        )
);
?>

<?php
echo $form->dropDownListRow($model
        , 'vehicle_id'
        , Vehicle::model()->findList('type_id = :type', array(':type' => $model->type_id))
        , array('prompt' => 'Select a Vehicle')
);
?>

<?php
echo $form->dropDownListRow($model,
        'engine_id',
        Engine::model()->findList(),
        array('prompt' => 'Select an Engine')
);
?>