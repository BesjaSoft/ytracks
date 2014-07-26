<div class="yiiForm">

<?php 

$script = <<<EOD

	$('#internal_url_chk').click(function() {
    	var other = $('#internal_url_chk:checked').val();
	    if (other != undefined){
	    	$('#internal_url').removeAttr('disabled');
	    	$('#internal_module').removeAttr('disabled');
	   	}else{
	    	$('#internal_url').attr('disabled', true);
	    	$('#internal_module').attr('disabled', true);
	    	$('#internal_url').val("");
	    	$('#internal_module').val("");
	   	}
	});

	$('#external_url_chk').click(function() {
    	var other = $('#external_url_chk:checked').val();
	    if (other != undefined){
	    	$('#external_url').removeAttr('disabled');
	   	}else{
	    	$('#external_url').attr('disabled', true);
	   	}
	});
	
	$('#internal_module').change(function() {
	    	$('#internal_url').val($("#internal_module").val());
	});

EOD;

?>

<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php 

Yii::app()->clientScript->registerScript('internalUrl', $script, CClientScript::POS_READY);

echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($tree); ?>
<table>
<tr>
	<td><?php echo CHtml::activeLabelEx($tree,'lang'); ?></td>
	<td><?php echo CHtml::activeDropDownList($tree,'lang', Yii::app()->params["languages"]); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabel($tree,'is_standalone'); ?></td>
	<td><?php echo CHtml::activeCheckbox($tree,'is_standalone'); ?></td>
</tr>
<tr>
	<td colspan="2"><hr size="1" /></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($tree,'name'); ?></td>
	<td><?php echo CHtml::activeTextField($tree,'name',array('size'=>60,'maxlength'=>255)); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($tree,'external_url'); ?></td>
	<td><?php 
	echo Chtml::checkBox("external_url_chk", ($tree->external_url != null ? true : false));
	echo CHtml::activeTextField($tree,'external_url',array("id" => "external_url",'maxlength'=>255, "style" => "width: 180px;", "disabled" => ($tree->external_url == null ? "disabled" : ""))); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($tree,'internal_url'); ?></td>
	<td>
	<?php
	echo Chtml::checkBox("internal_url_chk", ($tree->internal_url != null ? true : false ));
	$ddlOptions = array("id" => "internal_module", "prompt" => Yii::t("general", "TXT_CHOOSE"));
	$txtOptions = array("id" => "internal_url", "style" => "width: 180px;");
	if ($tree->internal_url == null)
	{
		 $ddlOptions["disabled"] = "disabled"; 
		 $txtOptions["disabled"] = "disabled";
	}
	
	echo CHtml::dropDownList("internal_module", $tree->internal_url, $modules, $ddlOptions);
	echo CHtml::activeTextField($tree,'internal_url', $txtOptions); 
	?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($tree,'parent'); ?></td>
	<td><?php echo CHtml::activeDropDownList($tree, 'id', $combo); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabel($tree,'is_newwindow'); ?></td>
	<td><?php echo CHtml::activeCheckbox($tree,'is_newwindow'); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabel($tree,'is_active'); ?></td>
	<td><?php echo CHtml::activeCheckbox($tree,'is_active'); ?></td>
</tr>
<tr>
	<td></td>
	<td colspan="2" align="right"><?php echo CHtml::submitButton($update ? Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->