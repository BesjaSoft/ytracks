<?php 

$email->subject = 'Uus parool';

?>

Tere <?php echo $user->firstname; ?>,<br /><br />

<p>
Teie uus parool on : <b><?php echo $user->passwordUnHashed ?></b>
</p>

Logida sisse saate aadressil <?php echo Yii::app()->name." (".CHtml::link(Yii::app()->request->getBaseUrl(true), Yii::app()->request->getBaseUrl(true)).")"; ?><br /><br />
