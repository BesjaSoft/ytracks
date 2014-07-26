<h2><?php echo Yii::t("section", "SECTION_TITLE_MANAGE"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("section", "SECTION_BTN_ADDNEW"),array('create')); ?>]
</div>

<div id="menulist"></div>

<div class="languages">
    <?php  
    foreach(Yii::app()->params["languages"] as $lang => $langname){
    	echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/flag_'.$lang.'.gif', $langname, array("border" => 0)), array('/sections/admin/section_lang/'.$lang));
    	echo "&nbsp;";
    }
    ?>
</div>

<div class="table_wrapper">
	<div class="table_wrapper_inner">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<th><?php echo Yii::t("section", "SECTION_NAME");?></th>
    <th><?php echo Yii::t("section", "SECTION_INFO2");?></th>
    <th><?php echo Yii::t("section", "SECTION_URLS");?></th>
	<th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
</tr>
<?php echo $tree; ?>
</table>
</div></div>