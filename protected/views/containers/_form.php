<div class="yiiForm">

<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($containers); ?>

<?php echo CHtml::activeHiddenField($containers,'section_id', array("value" => $section_id)); ?>

<table>
<tr>
	<td><?php echo CHtml::activeLabelEx($containers,'structure'); ?></td>
	<td><?php echo CHtml::activeDropDownList($containers,'structure', Containers::model()->getContainerTypes()); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($containers,'is_active'); ?></td>
	<td><?php echo CHtml::activeCheckbox($containers,'is_active'); ?></td>
</tr>
<tr>
	<td align="right" colspan="2"><?php echo CHtml::submitButton($update ? Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->