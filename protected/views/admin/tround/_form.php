<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'tround-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => "well form-horizontal")
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="form-group">
    <?php echo $form->labelEx($model, 'content_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-9">
        <b><?php echo CHtml::encode($model->content->title); ?></b>
    </div>
</div>

<?php echo $form->textFieldGroup($model, 'name', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php
echo $form->dropDownListGroup($model, 'event_id', array(
    'widgetOptions' => array(
        'data' => Event::model()->findList(),
        'prompt' => '-- Event --', 'class' => 'span5')));
?>

<?php
echo $form->dropDownListGroup($model, 'project_id', array(
    'widgetOptions' => array(
        'data' => Project::model()->findList(),
        'prompt' => '-- Project --',
        'class' => 'span5')));
?>

<?php echo $form->textFieldGroup($model, 'round_id', array('class' => 'span5')); ?>

<?php
echo $form->dropDownListGroup($model, 'circuit_id', Circuit::model()->findList()
        , array('prompt' => '- Select a Circuit -', 'class' => 'span5'));
?>
<?php echo $form->textFieldGroup($model, 'ordering', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'laps', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'length', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'distance_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'start_date', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'end_date', array('class' => 'span5')); ?>
<?php echo $form->textAreaGroup($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->textAreaGroup($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->checkBoxGroup($model, 'done'); ?>
<?php /* echo $form->textFieldGroup($model, 'checked_out', array('class' => 'span5')); ?>
  <?php echo $form->textFieldGroup($model, 'checked_out_time', array('class' => 'span5')); ?>
  <?php echo $form->textFieldGroup($model, 'published', array('class' => 'span5')); ?>
  <?php echo $form->textFieldGroup($model, 'manches', array('class' => 'span5')); ?>
  <?php echo $form->textFieldGroup($model, 'created', array('class' => 'span5')); ?>
  <?php echo $form->textFieldGroup($model, 'modified', array('class' => 'span5')); ?>
  <?php echo $form->checkBoxGroup($model, 'deleted'); ?>
  <?php echo $form->textFieldGroup($model, 'deleted_date', array('class' => 'span5')); */ ?>

<div class="form-group">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
