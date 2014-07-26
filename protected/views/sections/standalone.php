<h2><?php echo Yii::t("section", "SECTION_TITLE_STANDALONE"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("section", "SECTION_BTN_ADDNEW"),array('create')); ?>]
</div>

<?php if (count($standalonepages)) { ?>
<div class="table_wrapper">
	<div class="table_wrapper_inner">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
	<th><?php echo Yii::t("section", "SECTION_NAME");?></th>
    <th><?php echo Yii::t("section", "SECTION_INFO2");?></th>
    <th><?php echo Yii::t("section", "SECTION_URLS");?></th>
    <th><?php echo Yii::t("section", "SECTION_LANG");?></th>
	<th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
</tr>
<?php foreach($standalonepages as $page){ ?>
<tr>
    <td><?php echo CHtml::link($page->name, array("/containers/admin", "section_id" => $page->id)); ?></td>
    <td><?php 
        echo Yii::t("section", "SECTION_ISACTIVE").': '.($page->is_active == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO")).'<br />';
        echo Yii::t("section", "SECTION_NEWWINDOW").': '.($page->is_newwindow == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO"));
    ?></td>
    <td><?php
        echo ($page->internal_url != null || $page->internal_url != "" ? Yii::t("section", "SECTION_INTERNALURL").': '.$page->internal_url.'<br />' : "");
        echo ($page->external_url != null || $page->external_url != "" ? Yii::t("section", "SECTION_EXTERNALURL").': '.$page->external_url : "");
     ?></td>
    <td><?php echo $page->lang; ?></td>
    <td>
    <div class="actions_menu">
    <?php 
        echo CHtml::link(Yii::t("general", "BTN_DELETE"), array("delete", "id" => $page->id), array('confirm'=>Yii::t("general", "TXT_DELETEPROMPT", array("%s" => $tree["node"]->name)), "class" => "delete")); 
		echo CHtml::link(Yii::t("general", "BTN_EDIT"), array("update", "id" => $page->id), array("class" => "edit"));
            
    ?>
    </div>
    </td>
</tr>

<?php } ?>
</table>
</div></div>

<?php }else{
    echo Yii::t("section", "NOSTANDALONEPAGES");
} ?>