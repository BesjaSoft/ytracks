
<h1><?php echo Yii::t("site", "CAR_CONTACT_TITLE"); ?></h1>

<?php

if(Yii::app()->user->hasFlash('success')) {
	Yii::app()->user->flash('success', array('<div class="confirmation">', '</div>'));
	return;
}

?>

<?php echo CHtml::form("", "post", array("class" => "nyroModal")); ?>

<?php echo CHtml::errorSummary($contact); ?>

<table id="repairOrderTable">
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'name'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'name'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'email'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'email'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'phone'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'phone'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'carbrand'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'carbrand'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'cartype'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'cartype'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'caryear'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'caryear'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'workinhours'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'workinhours'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'fueltype'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'fueltype'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'vin'); ?></td>
    <td><?php echo CHtml::activeTextField($contact,'vin'); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($contact,'info'); ?></td>
    <td><?php echo CHtml::activeTextArea($contact,'info',array('rows'=>6, 'cols'=>30)); ?></td>
</tr>
<tr>
    <td colspan="2">
    
    <?php if(extension_loaded('gd')){ ?>
    <div class="simple">
    	<?php echo CHtml::activeLabelEx($contact,'verifyCode'); ?>
    	<div>
    	<?php $this->widget('CCaptcha'); ?>
    	<?php echo CHtml::activeTextField($contact,'verifyCode'); ?>
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