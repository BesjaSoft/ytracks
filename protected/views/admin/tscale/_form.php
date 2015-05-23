<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'merk', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'referentie', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'car', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'omschrijving', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'categorie', array('size' => 60, 'maxlength' => 250)); ?>

<div class="control-group">

    <?php echo $form->labelEx($model, 'type_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->hiddenField($model, 'type_id'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array('id' => 'type_id',
            'name' => 'type_id',
            'value' => $model->type->make->name . ' ' . $model->type->name,
            'source' => $this->createUrl('type/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 3,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Tscale_type_id").val($selectedObject.id);}'
            )
                )
        );
        ?>
        <?php echo $form->error($model, 'type_id'); ?>
    </div>
</div>

<?php
echo $form->dropDownListGroup($model, 'category_id', ModelCategory::model()->findList()
        , array('prompt' => 'Select a Category..')
);
?>

<?php echo $form->checkBoxGroup($model, 'deleted'); ?>


