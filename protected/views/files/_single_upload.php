
<hr size="1" />

<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm('', "post", array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::errorSummary($file); 

echo CHtml::activeHiddenField($file, "object_id", array("value" => $gallery_id, "id" => "object_id"));

?>

<table>
<tr>
	<td><?php echo CHtml::activeLabelEx($file,'file'); ?></td>
	<td><?php echo CHtml::activeFileField($file,'Filedata'); ?></td>
</tr>
<tr>
	<td>Categories</td>
	<td><?php echo CHtml::activeListBox($file,'categories', CHtml::listData(Categories::model()->getCategories("gallery"), "id", "title"), array("multiple" => "multiple", "size" => 7)); ?></td>
</tr>
<tr>
	<td>Tags</td>
	<td><?php echo CHtml::activeTextField($file,'tags',array('size'=>65)); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($file,'title'); ?></td>
	<td><?php echo CHtml::activeTextField($file,'title',array('size'=>60)); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($file,'description'); ?></td>
	<td><?php echo CHtml::activeTextArea($file,'description',array('rows'=>6, 'cols'=>50)); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($file,'status'); ?></td>
	<td><?php echo CHtml::activeDropDownList($file,'status', Files::model()->getStatusOptions()); ?></td>
</tr>
<tr>
	<td></td>
	<td align="right"><?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->