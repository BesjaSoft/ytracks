<h1><?php echo Yii::t("user", "USER_TITLE_RECOVERY"); ?></h1>

<?php 

if(Yii::app()->user->hasFlash('recover')) {
	Yii::app()->user->flash('recover', array('<div class="confirmation">', '</div>'));
	return;
}


?>

<h2><?php echo Yii::t("user", "TITLE_INSERTNEWPASS"); ?></h2>

<?php echo CHtml::errorSummary($form); ?>

<?php echo CHtml::beginForm();

//
//echo CHtml::activeHiddenField($form, "id", array("value" => $form->id));

?>
<table>
<tr>
    <td><?php echo CHtml::activeLabelEx($form, "password"); ?></td>
    <td><?php 
    $form->password = "";
    echo CHtml::activePasswordField($form, "password"); ?></td>
</tr>
<tr>
    <td><?php echo CHtml::activeLabelEx($form, "password_repeat"); ?></td>
    <td><?php echo CHtml::activePasswordField($form, "password_repeat"); ?></td>
</tr>
<tr>
    <td colspan="2" align="right"><?php echo CHtml::submitButton(Yii::t("general", "BTN_SAVE")); ?></td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>