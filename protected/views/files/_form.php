<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm('', "post", array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::errorSummary($model); 


echo CHtml::activeHiddenField($model, 'user_id', array("value" => isset(Yii::app()->user->id) ? Yii::app()->user->id : 0));

?>

<table>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'file'); ?></td>
	<td><?php echo CHtml::activeFileField($model,'Filedata'); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'title'); ?></td>
	<td><?php echo CHtml::activeTextField($model,'title',array('size'=>60)); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'description'); ?></td>
	<td><?php echo CHtml::activeTextArea($model,'description',array('rows'=>6, 'cols'=>50)); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($model,'status'); ?></td>
	<td><?php echo CHtml::activeTextField($model,'status'); ?></td>
</tr>
<tr>
	<td></td>
	<td align="right"><?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->