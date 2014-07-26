<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'id' => 'circuit-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'well')
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($model, 'shortname', array('size' => 30, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'alias', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($model, 'city', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->dropdownListRow($model, 'country_code', Countries::findList()); ?>
    <?php echo $form->textFieldRow($model, 'length'); ?>

    <?php echo $form->dropdownlistRow($model, 'distance_id', Distance::model()->findList(),array('prompt' => '- Select a distance -')); ?>

    <?php echo $form->checkBoxRow($model, 'published'); ?>
    <?php echo $form->textFieldRow($model, 'ordering'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->