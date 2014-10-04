<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'htmlOptions' => array('class' => "well form-horizontal"),
        'id' => 'event-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->dropdownListRow($model, 'country_code', Countries::findList()); ?>
    <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'ordering'); ?>
    <?php echo $form->checkBoxRow($model, 'published'); ?>

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

</div><!-- form -->