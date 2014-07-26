<p>
<?php
$email->subject = 'Palun Valideerige e-mail';

echo $user->username; ?>,
</p>
<?php if ($user->isNewRecord) { ?>
<p>
Täname, et registreerisite veebilehel <?php echo CHtml::encode(Yii::app()->name); ?> (<?php echo CHtml::link(Yii::app()->request->getBaseUrl(true), Yii::app()->request->getBaseUrl(true)) ?>)
</p>
<p>
Kasutajanimi: <?php echo $user->username; ?>
<br />
Parool: <?php echo $user->passwordUnHashed ?>
</p>
<?php } else {?>
<p>
You have changed your email at <?php echo CHtml::encode(Yii::app()->name); ?> (<?php echo CHtml::link(Yii::app()->request->getBaseUrl(true), Yii::app()->request->getBaseUrl(true)) ?>).  You must now re-verify your email to login.
</p>
<?php }?>
<p>
Aktiveerimiseks vajuta allolevale lingile:<br />
<?php
$url = Yii::app()->request->getHostInfo().CHtml::normalizeUrl(array('user/verify', 'id'=>$user->id, 'code'=>$user->email_confirmed));
echo CHtml::link($url, $url);
?>
</p>