<h2><?php echo $user->username." ".Yii::t("user", "PROFILE"); ?></h2>
<p>
	<?php echo Yii::t("user", "USER_REGISTERED"); ?>:<b><?php echo Time::nice($user->created, 'd.m.Y (H:i)'); ?></b>
</p>

<div class="yiiForm">
<div class="simple">
<?php echo CHtml::activeLabel($user,'firstname'); ?>
<?php echo $user->firstname; ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'lastname'); ?>
<?php echo $user->lastname; ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user,'email'); ?>
<?php echo $user->email; ?>
</div>

<?php 

if (isset($user->company) && !empty($user->company)){ ?>
<div class="simple">
<?php echo CHtml::activeLabel($user->company,'name'); ?>
<?php echo $user->company->name; ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user->company,'category_id'); ?>
<?php 
    $categories = Categories::model()->getCategories();
    echo $categories[$user->company->category_id]; 
?>
</div>
<?php } ?>

<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'country_id'); ?>
<?php 
$country = CHtml::listData(Countries::model()->getCountries(), 'id', 'name');
echo $country[$user->profile->country_id]; ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_state'); ?>
<?php echo $user->profile->address_state; ?>
</div>


<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_city'); ?>
<?php echo $user->profile->address_city; ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_postcode'); ?>
<?php echo $user->profile->address_postcode; ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_street'); ?>
<?php echo $user->profile->address_street; ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user,'notify_messages'); ?>
<?php echo ($user->notify_messages == 1 ? Yii::t("user", "TXT_YES") : Yii::t("user", "TXT_NO")) ; ?>
</div>

</div>