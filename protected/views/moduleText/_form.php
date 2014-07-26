<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); 

if ($module_id > 0){
	echo CHtml::activeHiddenField($model, 'module_id', array("value" => $module_id));
}
echo CHtml::activeHiddenField($model, 'section_id', array("value" => $section_id));
echo CHtml::activeHiddenField($model, 'user_id', array("value" => $user_id));
?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'title'); ?>
<?php echo CHtml::activeTextField($model,'title', array("style" => "width: 500px;")); ?>
</div>
<div class="simple">
<?php echo CHtml::activeTextArea($model,'content', array('rows'=>6, 'cols'=>60));
$this->widget('application.extensions.editor.editor', array('name'=>'ModuleText[content]', 'type'=>'fckeditor',
            'height' => 500, 'toolbar' => 'Default'));
?>
</div>


<div class="action">
<?php echo CHtml::submitButton($update ? Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?>
</div>

<?php echo CHtml::endForm(); ?>
