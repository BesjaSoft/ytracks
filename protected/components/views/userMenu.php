
<div id="blockUserMenu">
<p>Tere, lp. <?php echo Yii::app()->user->firstname." ".Yii::app()->user->lastname; ?></p>
<ul>
<li><?php echo CHtml::link('Minu artiklid',array('/articles/list')); ?></li>
<li><?php echo CHtml::link('Minu kuulutused',array('/kuulutused/kuulutus/list')); ?></li>
<li><?php echo CHtml::link('Kontaktisikud',array('/kuulutused/kontaktisik/list/'.Yii::app()->user->id)); ?></li>
<li><?php echo CHtml::link('Lisa finantseerija',array('/kuulutused/finantseerija/create/')); ?></li>
<li>--</li>
<li><?php echo CHtml::link('Muuda profiil',array('/user/update/')); ?></li>
<?php echo (Yii::app()->user->isAdmin ? "<li>".CHtml::link('Admin',array('/sections/admin'))."</li>" : ""); ?>
<li><?php echo CHtml::linkButton('Logout',array(
	'submit'=>'',
	'params'=>array('command'=>'logout')
)); ?></li>
</ul>
</div>