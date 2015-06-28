<div class="form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm',
            array(
        'type' => 'horizontal',
        'id' => 'type-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'make_id'); ?>
        <?php echo $form->textField($model, 'make_id'); ?>
        <?php echo $form->error($model, 'make_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'alias'); ?>
        <?php echo $form->textField($model, 'alias', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'alias'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'code'); ?>
        <?php echo $form->textField($model, 'code', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php echo $form->textField($model, 'parent_id'); ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tuner_id'); ?>
        <?php echo $form->textField($model, 'tuner_id'); ?>
        <?php echo $form->error($model, 'tuner_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'enginetype_id'); ?>
        <?php echo $form->textField($model, 'enginetype_id'); ?>
        <?php echo $form->error($model, 'enginetype_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'compression'); ?>
        <?php echo $form->textField($model, 'compression', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'compression'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'published'); ?>
        <?php echo $form->textField($model, 'published'); ?>
        <?php echo $form->error($model, 'published'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ordering'); ?>
        <?php echo $form->textField($model, 'ordering'); ?>
        <?php echo $form->error($model, 'ordering'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'checked_out'); ?>
        <?php echo $form->textField($model, 'checked_out'); ?>
        <?php echo $form->error($model, 'checked_out'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'checked_out_time'); ?>
        <?php echo $form->textField($model, 'checked_out_time'); ?>
        <?php echo $form->error($model, 'checked_out_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'created'); ?>
        <?php echo $form->textField($model, 'created'); ?>
        <?php echo $form->error($model, 'created'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'modified'); ?>
        <?php echo $form->textField($model, 'modified'); ?>
        <?php echo $form->error($model, 'modified'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'deleted'); ?>
        <?php echo $form->textField($model, 'deleted'); ?>
        <?php echo $form->error($model, 'deleted'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'deleted_date'); ?>
        <?php echo $form->textField($model, 'deleted_date'); ?>
        <?php echo $form->error($model, 'deleted_date'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->