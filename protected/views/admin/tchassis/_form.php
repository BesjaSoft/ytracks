<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'filename', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'tmake', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'ttype', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'chassis', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'tengine', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'year', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->textFieldRow($model, 'group', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'first_owner', array('size' => 200, 'maxlength' => 500)); ?>
<?php echo $form->textFieldRow($model, 'next_owners', array('size' => 200, 'maxlength' => 500)); ?>
<?php echo $form->textAreaRow($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->dropDownListRow($model,
        'make_id',
        Make::model()->findList(),
        array(
            'prompt' => 'Select a Make..',
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->baseUrl . '/index.php?r=admin/tchassis/gettypes', //url to call
                'update' => '#Tchassis_type_id' //selector to update
            )
        )
    );
?>
<?php echo $form->dropDownListRow($model
            , 'type_id'
            , Type::model()->findList('make_id = :make', array(':make' => $model->make_id))
            , array('prompt' => 'Select a Type'
        , 'ajax' => array('type' => 'POST' //request type
            , 'url' => Yii::app()->baseUrl . '/index.php?r=admin/tchassis/getvehicles' //url to call
            , 'update' => '#Tchassis_vehicle_id' //selector to update
        )
            )
    );
    ?>

<?php echo $form->dropDownListRow($model
            , 'vehicle_id'
            , Vehicle::model()->findList('type_id = :type', array(':type' => $model->type_id))
            , array('prompt' => 'Select a Vehicle')
    );
    ?>

<?php echo $form->checkBoxRow($model, 'deleted'); ?>



