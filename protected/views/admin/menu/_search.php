<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'menutype', array('class' => 'span5', 'maxlength' => 24)); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'note', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'path', array('class' => 'span5', 'maxlength' => 1024)); ?>

<?php echo $form->textFieldRow($model, 'link', array('class' => 'span5', 'maxlength' => 1024)); ?>

<?php echo $form->textFieldRow($model, 'type', array('class' => 'span5', 'maxlength' => 16)); ?>

<?php echo $form->textFieldRow($model, 'published', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'parent_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'level', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'component_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'checked_out', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'checked_out_time', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'browserNav', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'access', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'img', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'template_style_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textAreaRow($model, 'params', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'lft', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'rgt', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'home', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'language', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'client_id', array('class' => 'span5')); ?>

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
