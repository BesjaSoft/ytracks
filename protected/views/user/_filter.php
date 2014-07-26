<fieldset>
<legend>Filter</legend>

<?php
echo CHtml::beginForm("", "GET");
?>
<table class="dataGrid">
<tr>
	<td><?php echo Yii::t("user", "USER_KEYWORD")." ".CHtml::activeTextField($filter, "keyword"); ?></td>
    <td><?php echo Yii::t("user", "USER_ISIKUKOOD")." ".CHtml::activeTextField($filter, "isikukood"); ?></td>
    <!--<td><?php echo CHtml::activeDropDownList($filter, "category_id", CHtml::listData(Categories::model()->getCategories("category"), "id", "title"), array("prompt" => Yii::t("general", "TXT_CHOOSEALL"))); ?></td>-->
	<td><?php echo CHtml::submitButton(Yii::t("general", "BTN_SEARCH"), array("name" => "filter")); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>
</fieldset>
<br />