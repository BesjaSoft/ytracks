<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'id', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'asset_id', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'parent_id', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'lft', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'rgt', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'level', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'path', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'extension', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->textFieldGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'note', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textAreaGroup($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->textFieldGroup($model, 'published', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'checked_out', array('class' => 'span5', 'maxlength' => 11)); ?>
<?php echo $form->textFieldGroup($model, 'checked_out_time', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'access', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textAreaGroup($model, 'params', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->textFieldGroup($model, 'metadesc', array('class' => 'span5', 'maxlength' => 1024)); ?>
<?php echo $form->textFieldGroup($model, 'metakey', array('class' => 'span5', 'maxlength' => 1024)); ?>
<?php echo $form->textFieldGroup($model, 'metadata', array('class' => 'span5', 'maxlength' => 2048)); ?>
<?php echo $form->textFieldGroup($model, 'created_user_id', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'created_time', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'modified_user_id', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'modified_time', array('class' => 'span5')); ?>
<?php echo $form->textFieldGroup($model, 'hits', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'language', array('class' => 'span5', 'maxlength' => 7)); ?>
<?php echo $form->textFieldGroup($model, 'version', array('class' => 'span5', 'maxlength' => 10)); ?>

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
