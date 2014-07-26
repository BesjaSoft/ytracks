<?php
$email->subject = 'Andmete taastamine';
?>
Tere, 
<p>
Oled tellinud GoFoto pildipanga sisselogimise andmete taastamise(<?php echo CHtml::link(Yii::app()->request->getBaseUrl(true), Yii::app()->request->getBaseUrl(true)) ?>)
</p>

<p>
Sinu kasutajanimi:  <?php echo $user->username ?>
<?php if ($newPassword) { ?>
Sinu uus parool: <?php echo $user->passwordUnHashed ?>
</p>
<p>
Sa või muuta oma parooli siin:<br />
<?php
$url = Yii::app()->request->getHostInfo().CHtml::normalizeUrl(array('user/update'));
echo CHtml::link('account settings', $url);
?>.
<?php } else { ?>
</p>
<p>
<?php
//$url = Yii::app()->request->getHostInfo().CHtml::normalizeUrl(array('user/update'));
//echo CHtml::link('account settings', $url);
?><br /><br />
Oma parooli uuendamiseks vajuta allolevale lingile:<br />
<?php
$url = Yii::app()->request->getHostInfo().CHtml::normalizeUrl(array('user/changepassword', 'id'=>$user->id, 'pass'=>$user->password));
echo CHtml::link($url, $url);
}
?>
</p>