<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'make_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'type_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'vehicle_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'description', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'reference', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'year', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'color', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'raceno', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'livery', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'event', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'drivers', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'category_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'scale_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'modeltype_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'material_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'deleted', array('class' => 'span5')); ?>

    <?php echo $form->textFieldGroup($model, 'deleted_date', array('class' => 'span5')); ?>

<div class="form-group">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'Search'
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
