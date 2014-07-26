<fieldset>
<legend>Filter</legend>

<?php

echo CHtml::errorSummary($form);
 
echo CHtml::beginForm();
?>
<table class="dataGrid">
<tr>
	<td><?php echo CHtml::activeLabelEx($form, "keyword"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "keyword"); ?></td>
    <td><?php echo CHtml::activeLabelEx($form, "module"); ?></td>
    <td><?php echo CHtml::activeDropDownList($form, "module", Categories::model()->getModules(), array("prompt" => Yii::t("general", "TXT_CHOOSEALL"))); ?></td>
    <td><?php echo CHtml::submitButton(Yii::t("general", "BTN_SEARCH")); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>
</fieldset>
<br />