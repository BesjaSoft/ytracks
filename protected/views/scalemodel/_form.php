<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm',
        array(
    'id' => 'scalemodel-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'well')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->hiddenField($model, 'make_id'); ?>
    <?php echo $form->labelEx($model, 'make_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array('id' => 'make_id',
            'name' => 'make_id',
            'value' => $model->make->name,
            'source' => $this->createUrl('make/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 2,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Scalemodel_make_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('class' => 'form-control')
        ));
        ?>
        <?php echo $form->error($model, 'make_id'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->hiddenField($model, 'type_id'); ?>
    <?php echo $form->labelEx($model, 'type_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array('id' => 'type_id',
            'name' => 'type_id',
            'value' => $model->type->fullname,
            'source' => $this->createUrl('type/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 2,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Scalemodel_type_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('class' => 'form-control')
        ));
        ?>
        <?php echo $form->error($model, 'type_id'); ?>
    </div>
</div>
<?php echo $form->textFieldGroup($model, 'vehicle_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'description', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'reference', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldGroup($model, 'year', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'color', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'raceno', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'livery', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'event', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'drivers', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->dropDownListGroup($model, 'category_id', array('widgetOptions' => array('data' => ModelCategory::model()->findList(), 'prompt' => '-- Category --'))); ?>
<?php echo $form->dropDownListGroup($model, 'scale_id', array('widgetOptions' => array('data' => Scale::model()->findList(), 'prompt' => '-- Scale --'))); ?>
<?php echo $form->dropDownListGroup($model, 'modeltype_id', array('widgetOptions' => array('data' => ModelType::model()->findList(), 'prompt' => '-- Modeltype --'))); ?>
<?php echo $form->dropDownListGroup($model, 'material_id', array('widgetOptions' => array('data' => Material::model()->findList(), 'prompt' => '-- Material --'))); ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array('buttonType' => 'submit', 'label' => $model->isNewRecord ? 'Create' : 'Save', 'context' => 'primary')
            );
            ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
