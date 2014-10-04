<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tproject-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => "well form-horizontal")
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'content_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <b><?php echo CHtml::encode($model->content->title); ?></b>
    </div>
</div>

<?php
echo $form->dropDownListRow($model, 'project_id', Project::model()->findList(), array('prompt' => '- Select a Project -', 'class' => 'span5'));
?>

<?php
echo $form->dropDownListRow($model, 'competition_id', Competition::model()->findList(), array('prompt' => '- Select a Season -', 'class' => 'span5'));
?>

<?php
echo $form->dropDownListRow($model, 'season_id', Season::model()->findList(), array('prompt' => '- Select a Season -', 'class' => 'span5'));
?>
<?php echo $form->checkBoxRow($model, 'done'); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
