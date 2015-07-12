<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'content_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldGroup($model, 'project_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'competition_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'season_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'created', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'modified', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'deleted', array('class' => 'span5')); ?>

    <?php echo $form->textFieldGroup($model, 'deleted_date', array('class' => 'span5')); ?>

<div class="form-group">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
