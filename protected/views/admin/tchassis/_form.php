<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'tchassis-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'well')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'filename', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'tmake', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'ttype', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'chassis', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'tengine', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'tengine_number', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'year', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'group', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'first_owner', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldGroup($model, 'next_owners', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldGroup($model, 'original_color', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'original_registration_number', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'later_registration_numbers', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textAreaGroup($model, 'competition_appearances', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaGroup($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php
echo $form->dropDownListGroup($model, 'make_id', Make::model()->findList(), array(
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
echo $form->dropDownListGroup($model, 'type_id', Type::model()->findList('make_id = :make', array(':make' => $model->make_id))
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
echo $form->dropDownListGroup($model, 'vehicle_id', Vehicle::model()->findList('type_id = :type', array(':type' => $model->type_id)), array('class' => 'span5', 'prompt' => '- Select a Vehicle -'));
?>

<?php echo $form->dropDownListGroup($model, 'engine_id', Engine::model()->findList(), array('class' => 'span5','prompt'=> '- select an Engine - ')); ?>

<?php echo $form->textFieldGroup($model, 'published', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'done', array('class' => 'span5')); ?>


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
