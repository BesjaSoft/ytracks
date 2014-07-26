<p>
<?php
$email->subject = 'Palun Valideerige e-mail';

echo $user->username; ?>,
</p>
<?php if ($user->isNewRecord) { ?>
<p>
Täname, et registreerisite partnerluse programmis <?php echo CHtml::encode(Yii::app()->name); ?> (<?php echo CHtml::link(Yii::app()->request->getBaseUrl(true), Yii::app()->request->getBaseUrl(true)) ?>)
Oma statistika jälgimiseks logige palun järgmiste andmetega sisse:
</p>
<p>

Kasutaja: <?php echo $user->username; ?>
<br />
Parool: <?php echo $user->passwordUnHashed ?>
</p>
<?php } else {?>
<p>
Olete muutunud oma e-maili <?php echo CHtml::encode(Yii::app()->name); ?> (<?php echo CHtml::link(Yii::app()->request->getBaseUrl(true), Yii::app()->request->getBaseUrl(true)) ?>). Sisse logimiseks pead uuesti kinnitama oma uue e-maili.
</p>
<?php }?>
<p>
Oma konto aktiveerimseks vajuta järgnevale linglie:<br />
<?php
$url = Yii::app()->request->getHostInfo().CHtml::normalizeUrl(array('user/verify', 'id'=>$user->id, 'code'=>$user->email_confirmed));
echo CHtml::link($url, $url);
?>
</p>

Lugupidamisega<br />
SÖRVER'i meeskond<br />
Tel. +372 55 68 4416<br />
Skype: sorver.eu<br />
<a href="http://www.sorver.eu">www.sorver.eu</a>