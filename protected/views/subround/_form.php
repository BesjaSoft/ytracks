<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'id' => 'subround-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'round_id'); ?>
    <?php echo $form->dropdownListRow($model, 'subroundtype_id', Subroundtype::model()->findList(), array('prompt' => 'Select a Subroundtype..')); ?>
    <?php echo $form->dropdownListRow($model, 'raceclass_id', Raceclass::model()->findList(), array('prompt' => 'Select a Raceclass..')); ?>
    <?php echo $form->textFieldRow($model, 'name'); ?>
    <?php echo $form->textFieldRow($model, 'ordering'); ?>
    <?php echo $form->textFieldRow($model, 'start_date'); ?>
    <?php echo $form->textFieldRow($model, 'end_date'); ?>
    <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textAreaRow($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'comment'); ?>
    <?php echo $form->textFieldRow($model, 'factor', array('size' => 8, 'maxlength' => 8)); ?>
    <?php echo $form->checkBoxRow($model, 'published'); ?>


    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->