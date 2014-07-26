
<div style="border: 1px solid gray">
<table width="100%" cellpadding="3" cellspacing="0">
<tr style="background-color:#E0E0E0;">
	<td><b><?php echo Yii::t("inbox", "MESSAGE_FROM"); ?>:</b></td>
	<td><?php echo $message->user->lastname." ".$message->user->firstname; ?></td>
</tr>
<tr style="background-color:#E0E0E0;">
	<td><b><?php echo Yii::t("inbox", "MESSAGE_SUBJECT"); ?>:</b></td>
	<td><?php echo $message->subject; ?></td>
</tr>
<tr style="background-color:#E0E0E0;">
	<td><b><?php echo Yii::t("inbox", "MESSAGE_ATTACHMENTS"); ?>:</b></td>
	<td>
    <?php 
    $images = unserialize($message->attachments);
    //print_r ($images);
    if (is_array($images) && !empty($images))
    {
        foreach($images as $image)
        {
            echo $image."<br />";    
        }
    }
    ?>
    </td>
</tr>
<tr>
	<td colspan="2"><?php echo $message->message; ?></td>
</tr>
</table>

</div>