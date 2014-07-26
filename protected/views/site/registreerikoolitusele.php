<h2>Registreerimine</h2>


<?php

if(Yii::app()->user->hasFlash('success')) {
	Yii::app()->user->flash('success', array('<div class="confirmation">', '</div>'));
	return;
}

?>

<?php

echo CHtml::beginForm();

echo CHtml::errorSummary($form);
?>

<table class="register">
<tr>
    <td><?php echo CHtml::activeLabel($form, "firstname"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "firstname"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "lastname"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "lastname"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "isikukood"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "isikukood"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "birthday"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "birthday"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "course"); ?></td>
    <td><?php echo CHtml::activeDropDownList($form, "course", $form->courses); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "phone"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "phone"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "email"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "email"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "address"); ?></td>
    <td><?php echo CHtml::activeTextField($form, "address"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "university"); ?></td>
    <td><?php echo CHtml::activeDropDownList($form, "university", $form->universities); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "current_work"); ?></td>
    <td><?php echo CHtml::activeTextarea($form, "current_work", array("rows" => 10, "cols" => 6)); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabel($form, "additional_info"); ?></td>
    <td><?php echo CHtml::activeTextarea($form, "additional_info"); ?></td>
</tr>
<tr>
    <td colspan="2">
    
    <?php if(extension_loaded('gd')){ ?>
    <div class="simple">
    	<?php echo CHtml::activeLabelEx($form,'verifyCode'); ?>
    	<div>
    	<?php $this->widget('CCaptcha'); ?>
    	<?php echo CHtml::activeTextField($form,'verifyCode'); ?>
    	</div>
    	<p class="hint"><?php echo Yii::t("site", "SITE_VERIFICATIONHELP"); ?></p>
    </div>
    <?php } ?>
    </td>
</tr>
<tr>
    <td colspan="2" align="right"><?php echo CHtml::submitButton(Yii::t("general", "BTN_SEND")); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>