<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm',
            array(
        'type' => 'horizontal',
        'id' => 'subround-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model, 'round_id'); ?>
    <?php
    echo $form->dropDownListGroup($model, 'subroundtype_id',
            array(
        'widgetOptions' => array(
            'data' => Subroundtype::model()->findList(), 'prompt' => '-- Subroundtype --')));
    ?>
    <?php
    echo $form->dropDownListGroup($model, 'raceclass_id',
            array(
        'widgetOptions' => array(
            'data' => Raceclass::model()->findList(), 'prompt' => '-- Raceclass --')));
    ?>
    <?php echo $form->textFieldGroup($model, 'name'); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>
    <?php echo $form->textFieldGroup($model, 'start_date'); ?>
    <?php echo $form->textFieldGroup($model, 'end_date'); ?>
    <?php echo $form->textAreaGroup($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textAreaGroup($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'comment'); ?>
<?php echo $form->textFieldGroup($model, 'factor', array('size' => 8, 'maxlength' => 8)); ?>
<?php echo $form->checkBoxGroup($model, 'published'); ?>


    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <?php
            $this->widget('booster.widgets.TbButton',
                    array('buttonType' => 'submit', 'context' => 'primary', 'label' => $model->isNewRecord ? 'Create' : 'Save'));
            ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->