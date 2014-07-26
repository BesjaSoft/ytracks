
<div style="height:15px;">
    <div style="position:relative;float:left;width:210px;">
<?php 

$themePath = Yii::app()->theme->baseUrl;

echo CHtml::image($themePath."/images/corner_topleft.gif", "ctl", array("class" => "ctl"));
echo CHtml::image($themePath."/images/corner_topright.gif", "ctr", array("class" => "ctr"));
echo CHtml::image($themePath."/images/corner_bottomleft.gif", "cbl", array("class" => "cbl"));
echo CHtml::image($themePath."/images/corner_bottomright.gif", "cbr", array("class" => "cbr"));

?>

<div style="border:1px solid #ccc;padding:8px;padding-top:6px;padding-bottom:6px;padding-right:10px;font-size: 10px;">
				
<h1 style="border-bottom:1px solid #ccc;font-size:14px;font-weight:bold;"><?php echo Yii::t("user", "TITLE_EMAILLOGIN"); ?></h1>

<form name="form" action="http://sorver.eu/roundcube/" method="post">
<input type="hidden" name="_token" value="fe3d660931af87f585f313d6f48808ab" />
<input type="hidden" name="_action" value="login" />
<input type="hidden" name="_timezone" id="rcmlogintz" value="_default_" />
<input type="hidden" name="_url" id="rcmloginurl" value="" />
<table summary="" border="0">
<tbody>
<tr>
    <td class="title"><label for="rcmloginuser"><?php echo Yii::t("user", "USER_EMAIL"); ?></label></td>
    <td><input name="_user" id="rcmloginuser" size="20" autocomplete="off" type="text" /></td>
</tr>
<tr>
    <td class="title"><label for="rcmloginpwd"><?php echo Yii::t("user", "USER_PASSWORD"); ?></label></td>
    <td><input name="_pass" id="rcmloginpwd" size="20" autocomplete="off" type="password" /></td>
</tr>
<tr>
    <td colspan="2" align="right"><input type="submit" class="button mainaction" value="<?php echo Yii::t("user", "BTN_LOGIN"); ?>" /></td>
</tr>
</tbody>
</table>


</form>

</div>

</div></div>