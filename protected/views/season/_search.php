<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 40)); ?>

<?php echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'ordering', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'checked_out', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'checked_out_time', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'published', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'deleted', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'deleted_date', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
