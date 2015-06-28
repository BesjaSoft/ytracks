<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm',
            array(
        'type' => 'horizontal',
        'id' => 'make-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'code', array('size' => 10, 'maxlength' => 10)); ?>

    <div class="form-group">
        <?php echo $form->hiddenField($model, 'founder_id'); ?>
        <?php echo $form->labelEx($model, 'founder_id', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete',
                    array('id' => 'founder_id',
                'name' => 'founder_id',
                'value' => isset($model->founder_id) ? $model->individual->full_name : $model->founder_id,
                'source' => $this->createUrl('individual/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 3,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Make_founder_id").val($selectedObject.id);}'
                ),
                'htmlOptions' => array('class' => 'form-control')
            ));
            ?>
            <?php echo $form->error($model, 'founder_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldGroup($model, 'logo', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>
    <?php echo $form->textFieldGroup($model, 'checked_out'); ?>
    <?php echo $form->checkBoxGroup($model, 'published'); ?>


    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton',
                array('buttonType' => 'submit', 'context' => 'primary', 'label' => $model->isNewRecord ? 'Create' : 'Save'));
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->