<?php echo CHtml::beginForm(array("/user/login")); ?>

<?php //echo CHtml::activeCheckBox($form,'rememberMe'); ?>
<?php //echo CHtml::activeLabel($form,'rememberMe'); ?>

<table>
<tr>
	<td><span class="gray"><?php echo CHtml::activeLabel($form, 'kasutajanimi'); ?></span></td>
	<td><?php echo CHtml::activeTextField($form,'username', array("style" => "width: 150px;")); ?>
	<?php echo CHtml::error($form,'username'); ?></td>
</tr>
<tr>
	<td><span class="gray"><?php echo CHtml::activeLabel($form,'parool'); ?></span></td>
	<td><?php echo CHtml::activePasswordField($form,'password', array("style" => "width: 150px;")); ?>
	<?php echo CHtml::error($form,'password'); ?></td>
</tr>
<tr>
	<td colspan="2" valign="middle">
		<?php 
			echo CHtml::link(Yii::t("user", "USER_LOSTUSERNAME"), array("/user/recover"), array("class" => "gray")); 
			echo "&nbsp;";
			echo CHtml::submitButton(Yii::t("user", "BTN_LOGIN")); 
		?>
	</td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>