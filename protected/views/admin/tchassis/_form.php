<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tchassis-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'well')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'filename', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'tmake', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'ttype', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'chassis', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'tengine', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'tengine_number', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'year', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'group', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'first_owner', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'next_owners', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'original_color', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'original_registration_number', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'later_registration_numbers', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textAreaRow($model, 'competition_appearances', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php
echo $form->dropDownListRow($model, 'make_id', Make::model()->findList(), array(
    'class' => 'span5',
    'prompt' => '- Select a Make -',
    'ajax' => array(
        'type' => 'POST', //request type
        'url' => Yii::app()->baseUrl . '/index.php?r=admin/tchassis/gettypes', //url to call
        'update' => '#Tchassis_type_id' //selector to update
    )
        )
);
?>
<?php
echo $form->dropDownListRow($model, 'type_id', Type::model()->findList('make_id = :make', array(':make' => $model->make_id))
        , array('class' => 'span5',
    'prompt' => '-Select a Type -'
    , 'ajax' => array('type' => 'POST' //request type
        , 'url' => Yii::app()->baseUrl . '/index.php?r=admin/tchassis/getvehicles' //url to call
        , 'update' => '#Tchassis_vehicle_id' //selector to update
    )
        )
);
?>

<?php
echo $form->dropDownListRow($model, 'vehicle_id', Vehicle::model()->findList('type_id = :type', array(':type' => $model->type_id)), array('class' => 'span5', 'prompt' => '- Select a Vehicle -'));
?>

<?php echo $form->dropdownListRow($model, 'engine_id', Engine::model()->findList(), array('class' => 'span5','prompt'=> '- select an Engine - ')); ?>

<?php echo $form->textFieldRow($model, 'published', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'done', array('class' => 'span5')); ?>


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
