<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'content_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'project_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'competition_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'season_id', array('class' => 'span5')); ?>

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
