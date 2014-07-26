<div class="yiiForm">

<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); 
echo CHtml::activeHiddenField($model, 'user_id', array("value" => $user_id));
?>

<table>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'category_id'); ?></td>
	<td><?php echo CHtml::activeDropDownList($model, 'category_id', CHtml::listData(Categories::model()->getCategories("article"), 'id', 'title')); ?>
</td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'title'); ?></td>
	<td><?php echo CHtml::activeTextField($model,'title',array('maxlength'=>250, "style" => "width: 500px;")); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'body'); ?></td>
	<td><?php echo CHtml::activeTextArea($model,'body',array('rows'=>6, 'cols'=>70)); 
	$this->widget('application.extensions.editor.editor', array('name'=>'Articles[body]', 'type'=>'fckeditor',
            'height' => 400, 'width' => 500, 'language' => "et", 'toolbar' => "Basic"));
	?></td>
</tr>
<?php 

if (Yii::app()->user->isAdmin){ ?>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'status'); ?></td>
	<td><?php echo CHtml::activeDropDownList($model,'status', $model->getStatusOptions()); ?></td>
</tr>
<?php } ?>
<tr>
	<td colspan="2" align="right"><?php echo CHtml::submitButton($update ? Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?></td>
</tr>
</table>

<!--
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'image_id'); ?>
<?php echo CHtml::activeTextField($model,'image_id'); ?>
</div>
-->

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->