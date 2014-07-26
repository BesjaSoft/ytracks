<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'make_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'type_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'vehicle_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'description', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'reference', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'year', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'color', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'raceno', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'livery', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'event', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'drivers', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'category_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'scale_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modeltype_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'material_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'deleted', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'deleted_date', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search'
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
