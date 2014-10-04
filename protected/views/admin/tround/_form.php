<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tround-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => "well form-horizontal")
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'content_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <b><?php echo CHtml::encode($model->content->title); ?></b>
    </div>
</div>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->dropDownListRow($model, 'event_id', Event::model()->findList()
        , array('prompt' => '- Select an Event -', 'class' => 'span5'));
?>

<?php echo $form->dropDownListRow($model, 'project_id', Project::model()->findList()
        , array('prompt' => '- Select a Project -', 'class' => 'span5'));
?>

<?php echo $form->dropDownListRow($model, 'circuit_id', Circuit::model()->findList()
        , array('prompt' => '- Select a Circuit -', 'class' => 'span5'));
?>
<?php echo $form->textFieldRow($model, 'ordering', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'laps', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'length', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldRow($model, 'distance_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'start_date', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'end_date', array('class' => 'span5')); ?>
<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->textAreaRow($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->checkBoxRow($model, 'done'); ?>
<?php /*echo $form->textFieldRow($model, 'checked_out', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'checked_out_time', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'published', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'manches', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'created', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'modified', array('class' => 'span5')); ?>
<?php echo $form->checkBoxRow($model, 'deleted'); ?>
<?php echo $form->textFieldRow($model, 'deleted_date', array('class' => 'span5')); */ ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
