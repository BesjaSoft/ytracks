<h1><?php echo Yii::t("user", "USER_TITLE_LOGIN"); ?></h1>

<?php 
	echo CHtml::beginForm(array("/user/login"));
	echo CHtml::errorSummary($user); 
?>

<table>
<tr>
	<td><?php echo CHtml::activeLabel($user,'username'); ?></td>
	<td><?php echo CHtml::activeTextField($user,'username') ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabel($user,'password'); ?></td>
	<td><?php echo CHtml::activePasswordField($user,'password') ?></td>
</tr>
<!--
<tr>
	<td colspan="2"><?php echo CHtml::activeCheckBox($user,'rememberMe'); ?> <?php echo Yii::t("user", "USER_REMEMBERME"); ?><br/></td>
</tr>
-->
<tr>
	<td colspan="2" align="right"><?php echo CHtml::submitButton(Yii::t("general", "BTN_LOGIN")); ?></td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>

<p>
<?php echo CHtml::link(Yii::t("user", "USER_LOSTUSERNAME"), array('user/recover')); ?>
<br />
<?php echo CHtml::link(Yii::t("user", "USER_REGISTER"), array('user/register')); ?>
</p>