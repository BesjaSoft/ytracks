<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'individual-reference-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'individual_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->hiddenField($model, 'individual_id'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array('id'  => 'individual_id',
            'name' => 'individual_id',
            'value' => $model->individual->full_name,
            'source' => $this->createUrl('individual/autoComplete'),
            'options' => array(
                'showAnim'  => 'fold',
                'minLength' => 2,
                'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#IndividualReference_individual_id").val($selectedObject.id);}'
            ),
            'htmlOptions'=>array('class' => 'span5',),
                )
        );
        ?>
        <?php echo $form->error($model, 'make_id'); ?>
    </div>
</div>
<?php echo $form->textFieldRow($model, 'internal_reference', array('class'     => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->dropDownListRow($model, 'source_id', Source::model()->findList(), array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'source_reference', array('class'     => 'span5', 'maxlength' => 6)); ?>
<?php echo $form->textFieldRow($model, 'full_name', array('class'     => 'span5', 'maxlength' => 32)); ?>
<?php echo $form->textFieldRow($model, 'first_name', array('class'     => 'span5', 'maxlength' => 18)); ?>
<?php echo $form->textFieldRow($model, 'last_name', array('class'     => 'span5', 'maxlength' => 24)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type'       => 'primary',
        'label'      => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
