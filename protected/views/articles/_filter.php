
<fieldset>
<legend><?php echo Yii::t("general", "TXT_TITLE_FILTER") ?></legend>

<?php
echo CHtml::beginForm("", "GET");

echo CHtml::errorSummary($filter);
?>
<table class="dataGrid">
<tr>
	<td><?php echo CHtml::activeTextField($filter, "keyword", $_POST["keyword"]); ?></td>
	<td><?php echo CHtml::submitButton(Yii::t("general", "BTN_SEARCH")); ?></td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>
</fieldset>
<br />