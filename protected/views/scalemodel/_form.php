<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'scalemodel-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'well')
    ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group">
    <?php echo $form->hiddenField($model, 'make_id'); ?>
    <?php echo $form->labelEx($model, 'make_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
            array('id' => 'make_id',
                'name' => 'make_id',
                'value' => $model->make->name,
                'source' => $this->createUrl('make/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 2,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Scalemodel_make_id").val($selectedObject.id);}'
                )
            )
        );
        ?>
        <?php echo $form->error($model, 'make_id'); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->hiddenField($model, 'type_id'); ?>
    <?php echo $form->labelEx($model, 'type_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
            array('id' => 'type_id',
                'name' => 'type_id',
                'value' => $model->type->fullname,
                'source' => $this->createUrl('type/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 2,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Scalemodel_type_id").val($selectedObject.id);}'
                )
            )
        );
        ?>
        <?php echo $form->error($model, 'type_id'); ?>
    </div>
</div>
<?php echo $form->textFieldRow($model, 'vehicle_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'description', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'reference', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldRow($model, 'year', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'color', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'raceno', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'livery', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'event', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'drivers', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->dropdownListRow($model, 'category_id', ModelCategory::model()->findList(), array('class' => 'span5')); ?>
<?php echo $form->dropdownListRow($model, 'scale_id', Scale::model()->findList(), array('class' => 'span5')); ?>
<?php echo $form->dropdownListRow($model, 'modeltype_id', ModelType::model()->findList(), array('class' => 'span5')); ?>
<?php echo $form->dropdownListRow($model, 'material_id', Material::model()->findList(), array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'inverse',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
