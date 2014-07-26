<?php 


$script = <<<EOD

$('#generatePass').click(
    function(){
        $.pass = $.password(6);
        $("#User_password").val($.pass);
        $("#User_password_repeat").val($.pass);
        $("#newPass").html($.pass);
      return false;
    }
);



EOD;

Yii::app()->clientScript->registerScript('userPassword', $script, CClientScript::POS_READY);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/passGenerator/jquery.password.min.js');

?>

<h2><?php echo Yii::t("user", "TITLE_ADDNEWUSER"); ?></h2>

<div class="yiiForm">
<?php echo CHtml::form(); ?>

<?php echo CHtml::errorSummary(array($user, $user->company)); ?>

<div class="simple">
<?php echo CHtml::activeLabel($user,'username'); ?>
<?php echo CHtml::activeTextField($user,'username'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'password'); ?>
<?php echo CHtml::activePasswordField($user,'password'); 
echo CHtml::link(
        CHtml::image("../images/icons/gear_run.png", "Generate Password", array("border" => 0)),
        "#",
        array("id" => "generatePass")
);

?>
&nbsp;&nbsp;&nbsp;<span id='newPass'></span>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'password_repeat'); ?>
<?php echo CHtml::activePasswordField($user,'password_repeat'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'email'); ?>
<?php echo CHtml::activeTextField($user,'email'); ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user,'firstname'); ?>
<?php echo CHtml::activeTextField($user,'firstname'); ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user,'lastname'); ?>
<?php echo CHtml::activeTextField($user,'lastname'); ?>
</div>
<hr />

<div class="simple">
<?php echo CHtml::activeLabel($user->company,'company_name'); ?>
<?php echo CHtml::dropDownList('company_id', "", CHtml::listData(Companies::model()->getCompanies(), "id", "name"), array("prompt" => "Pole")); ?>
</div>
OR

<div class="simple">
<?php echo CHtml::activeLabel($user->company,'company_name'); ?>
<?php echo CHtml::activeTextField($user->company,'name'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->company,'regcode'); ?>
<?php echo CHtml::activeTextField($user->company,'regcode'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->company,'category_id'); ?>
<?php echo CHtml::activeDropDownList($user->company,'category_id', CHtml::listData(Categories::model()->getCategories("company"), "id", "title")); ?>
</div>

<hr />
<div class="simple">
<?php echo CHtml::activeLabel($user,'notify_messages'); ?>
<?php echo CHtml::activeCheckBox($user,'notify_messages'); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton(Yii::t("general", "BTN_CREATE")); ?>
</div>

</form>
</div><!-- yiiForm -->