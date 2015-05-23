<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldGroup($model, 'parent_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'lft', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'rgt', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'level', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldGroup($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'title', array('class' => 'span5', 'maxlength' => 100)); ?>

    <?php echo $form->textFieldGroup($model, 'rules', array('class' => 'span5', 'maxlength' => 5120)); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
