
<?php 

if (count($messages) > 0){  
  
?>

<div class="table_wrapper">
	<div class="table_wrapper_inner">
    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="dataGrid">
<tr>
    <th><?php echo $sort->link("to", Yii::t("inbox", "MESSAGE_TO")); ?></th>
    <th><?php echo $sort->link("subject", Yii::t("inbox", "MESSAGE_SUBJECT")); ?></th>
    <th><?php echo $sort->link("created", Yii::t("inbox", "MESSAGE_SENT")); ?></th>
    <th><?php echo Yii::t("general", "TXT_STATUS"); ?></th>
    <th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
</tr>
<?php

foreach($messages as $message){
    echo "<tr>";
    echo "<td>".($message->to_id > 0 ? CHtml::link($message->user->lastname." ".$message->user->firstname, array("/user/show/id/".$message->user->id)) : "")." ".($message->to_email != "" ? "[".CHtml::mailto($message->to_email, $message->to_email)."]" : "")."</td>";
    echo "<td>".CHtml::ajaxLink($message->subject, array("/inbox/message/id/".$message->id), array("update" => "#message"))."</td>";
    echo "<td>".Time::nice($message->created, "d.m.Y (H:i)")."</td>";
    
    $statuses = Inbox::model()->getMessageStatuses();
    echo '<td id="status_'.$message->id.'">'.$statuses[$message->status_user]."</td>";
    echo "<td>[".CHtml::link(Yii::t("general", "BTN_DELETE"), array("#"))."] ";
    
    if (Yii::app()->user->isAdmin)
    {
        //echo "[".CHtml::ajaxLink(Yii::t("general", "BTN_ACCEPT"), array("/inbox/changestatus/status/".Inbox::STATUS_ADMINACCEPTED."/id/".$message->id), array("update" => "#status_".$message->id))."]";
    }
    echo "[".CHtml::link(Yii::t("general", "BTN_SENDANSWER"), array("/inbox/answer/id/".$message->id), array("update" => "#status_".$message->id))."]";
    
    echo "</td></tr>";
}

?>
</table>
</div></div>
<?php 
$this->widget('CLinkPager',array('pages'=>$pages)); 

} else {
    echo '<font color="red">'.Yii::t("inbox", "NOMESSAGES").'</font>';
} ?>