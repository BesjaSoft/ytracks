<?php
/* @var $this IndividualReferenceController */
/* @var $model IndividualReference */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm',
            array(
        'id' => 'individual-reference-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->hiddenField($model, 'individual_id'); ?>
        <?php echo $form->labelEx($model, 'individual_id', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete',
                    array('id' => 'individual_id',
                'name' => 'individual_id',
                'value' => isset($model->individual_id) ? $model->individual->full_name : $model->individual_id,
                'source' => $this->createUrl('individual/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 3,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#IndividualReference_individual_id").val($selectedObject.id);}'
                ),
                'htmlOptions' => array('class' => 'form-control')
            ));
            ?>
<?php echo $form->error($model, 'individual_id'); ?>
        </div>
    </div>

    <?php
    echo $form->dropDownListGroup($model, 'source_id',
            array('widgetOptions' => array('data' => Weblink::model()->findList(), prompt => '-- source --'), 'wrapperHtmlOptions' => array(
            'class' => 'col-sm-6')));
    ?>

    <?php echo $form->textFieldGroup($model, 'source_reference',
            array('size' => 50, 'maxlength' => 50, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
    <?php echo $form->textFieldGroup($model, 'full_name',
            array('size' => 60, 'maxlength' => 250, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->textFieldGroup($model, 'first_name',
        array('size' => 60, 'maxlength' => 100, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
            <?php echo $form->textFieldgroup($model, 'last_name',
                    array('size' => 60, 'maxlength' => 150, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
<?php
$this->widget(
        'booster.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => $model->isNewRecord ? 'Create' : 'Save', 'context' => 'primary')
);
?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->