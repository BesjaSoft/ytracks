<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'vehicle-form',
        'enableAjaxValidation' => true,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
    ));
    ?>

    <p class="warning">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="control-group">
        <?php echo $form->hiddenField($model, 'type_id'); ?>
        <?php echo $form->labelEx($model, 'type_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete'
                    , array('id' => 'type_id',
                'name' => 'type_id',
                'value' => isset($model->type_id) ? $model->type->fullname : $model->type_id,
                'source' => $this->createUrl('type/autoComplete'),
                'options' => array('showAnim' => 'fold'
                    , 'minLength' => 3
                    , 'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Vehicle_type_id").val($selectedObject.id);}'
                )
                    )
            );
            ?>
            <?php echo $form->error($model, 'type_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldGroup($model, 'reference', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'chassisnumber', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldGroup($model, 'year', array('size' => 8, 'maxlength' => 8)); ?>
    <?php echo $form->textFieldGroup($model, 'color_id'); ?>
    <?php echo $form->textFieldGroup($model, 'condition_id'); ?>
    <?php echo $form->textFieldGroup($model, 'modifications', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'licenseplate', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->textFieldGroup($model, 'remarks', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'bodywork_id'); ?>
    <?php echo $form->textFieldGroup($model, 'carrosseriesoort_id'); ?>
    <?php echo $form->textFieldGroup($model, 'model', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'options', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'history', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'engine', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'group', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'first_owner', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'next_owners', array('size' => 60, 'maxlength' => 500)); ?>
    <?php echo $form->textFieldGroup($model, 'carrossier', array('size' => 60, 'maxlength' => 250)); ?>
    <?php echo $form->textAreaGroup($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->checkBoxGroup($model, 'published'); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->