<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'htmlOptions' => array('class' => "well form-horizontal"),
        'id' => 'event-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->dropDownListGroup($model, 'country_code', array('widgetOptions' => array('data' => Countries::findList(), 'prompt' => '-- Country --'))); ?>
    <?php echo $form->textAreaGroup($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>
    <?php echo $form->checkBoxGroup($model, 'published'); ?>

    <div class="form-actions">
        <div class="col-sm-offset-3">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',
            ));
            ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->