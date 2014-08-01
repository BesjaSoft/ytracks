<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'asset_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'parent_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'lft', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'rgt', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'level', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'path', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'extension', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'note', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'published', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'checked_out', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->textFieldRow($model, 'checked_out_time', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'access', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textAreaRow($model, 'params', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'metadesc', array('class' => 'span5', 'maxlength' => 1024)); ?>

<?php echo $form->textFieldRow($model, 'metakey', array('class' => 'span5', 'maxlength' => 1024)); ?>

<?php echo $form->textFieldRow($model, 'metadata', array('class' => 'span5', 'maxlength' => 2048)); ?>

<?php echo $form->textFieldRow($model, 'created_user_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'created_time', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modified_user_id', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'modified_time', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'hits', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'language', array('class' => 'span5', 'maxlength' => 7)); ?>

    <?php echo $form->textFieldRow($model, 'version', array('class' => 'span5', 'maxlength' => 10)); ?>

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
