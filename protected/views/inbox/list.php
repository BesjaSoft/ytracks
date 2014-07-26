<?php
//$this->breadcrumbs=array(
//	'Users Messages'=>array('index'),
//	'Manage',
//);

$themePath = Yii::app()->theme->baseUrl;

?>
<h2><?php echo Yii::t("inbox", "TITLE_MESSAGES"); ?></h2>

<div class="actionBar">
	[<?php echo CHtml::link(Yii::t("inbox", "BTN_CREATEMESSAGE"),array('create')); ?>]
</div><!-- actions -->

<table cellpadding="5" cellspacing="0" border="0" id="inbox">
<tr>
<td rowspan="2" valign="top" id="folders">
<strong><?php echo Yii::t("inbox", "TABLE_H_FOLDERS"); ?></strong>
<hr size="1" />
<?php 

foreach (Inbox::model()->getFolders() as $key => $folder)
{
    switch ($key){ 
        case Inbox::FOLDER_INBOX:
            echo "<div>".CHtml::image($themePath."/images/icons/folder.png")." ".CHtml::link($folder, array("/inbox/list/status/".Inbox::STATUS_NEW))." (".$count_inbox.") </div>";
            break;
        case Inbox::FOLDER_SENT:
            echo "<div>".CHtml::image($themePath."/images/icons/folder.png")." ".CHtml::link($folder, array("/inbox/list/status/".Inbox::STATUS_SENT))." (".$count_sent.") </div>";
            break;
        case Inbox::FOLDER_DRAFT:
            echo "<div>".CHtml::image($themePath."/images/icons/folder.png")." ".CHtml::link($folder, array("/inbox/list/status/".Inbox::STATUS_DRAFT))." (".$count_draft.") </div>";
            break;
        case Inbox::FOLDER_TRASH:
            echo "<div>".CHtml::image($themePath."/images/icons/folder.png")." ".CHtml::link($folder, array("/inbox/list/status/".Inbox::STATUS_DELETED))." (".$count_trash.") </div>";
            break;
    }
}

?>
</td>
    <td id="messages"><?php echo $this->renderPartial("_messages", array("messages" => $messages, 'sort' => $sort, 'pages' => $pages)); ?></td>
</tr>
<tr>
    <td id="message">
    <hr size="1" /> 
    <font color="red"><?php echo Yii::t("inbox", "INFO_CHOOSEMESSAGETOREAD"); ?></font></td>
</tr>
</table>