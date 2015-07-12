<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'id' => 'circuit-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'well')
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldGroup($model, 'shortname', array('size' => 30, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldGroup($model, 'city', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->dropDownListGroup($model, 'country_code', Countries::findList()); ?>
    <?php echo $form->textFieldGroup($model, 'length'); ?>

    <?php echo $form->dropdownlistRow($model, 'distance_id', Distance::model()->findList(),array('prompt' => '- Select a distance -')); ?>

    <?php echo $form->checkBoxGroup($model, 'published'); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->