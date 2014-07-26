<h1><?php echo Yii::t("user", "USER_TITLE_RECOVERY"); ?></h1>

<?php
if(Yii::app()->user->hasFlash('recover')) {
	Yii::app()->user->flash('recover', array('<div class="confirmation">', '</div>'));
	return;
}
?>
<div class="yiiForm">

<?php echo CHtml::errorSummary($user); ?>

<?php echo CHtml::beginForm(); ?>
<table>
<tr>
	<td><?php echo CHtml::activeLabel($user,'email'); ?></td>
	<td><?php echo CHtml::activeTextField($user,'email') ?></td>
	<td><?php echo CHtml::submitButton(Yii::t("general", "BTN_SEND")); ?></td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->