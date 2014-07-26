<h2><?php echo Yii::t("user", "TITLE_USERUPDATE"); ?></h2>

<div class="yiiForm">
<?php 
// '', 'post', array('autocomplete'=>'off')
echo CHtml::form(); ?>

<?php 
	echo CHtml::errorSummary(array($user, $user->profile, $user->company)); 
	echo CHtml::activeHiddenField($user, "id", array("value" => $user->id));
?>


<div class="simple">
<?php echo CHtml::activeLabel($user,'email'); ?>
<?php echo CHtml::activeTextField($user,'email'); ?>
<p class="hint">Note: If you change your email address you will be immediately logged out and will not be able to log back in until you revalidate your email address.</p>
</div>
<hr />

<div class="simple">
<?php echo CHtml::activeLabel($user,'firstname'); ?>
<?php echo CHtml::activeTextField($user,'firstname'); ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user,'lastname'); ?>
<?php echo CHtml::activeTextField($user,'lastname'); ?>
</div>

<hr />

<div class="simple">
<?php echo CHtml::activeLabel($user->company,'name'); ?>
<?php echo CHtml::activeTextField($user->company,'name'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->company,'category_id'); ?>
<?php echo CHtml::activeDropDownList($user->company, 'category_id', CHtml::listData(Categories::model()->getCategories("company"), 'id', 'title')); ?>
</div>

<hr />

<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'country_id'); ?>
<?php echo CHtml::activeDropDownList($user->profile,'country_id', CHtml::listData(Countries::model()->getCountries(), 'id', 'name') ); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_state'); ?>
<?php echo CHtml::activeTextField($user->profile,'address_state'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_city'); ?>
<?php echo CHtml::activeTextField($user->profile,'address_city'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_postcode'); ?>
<?php echo CHtml::activeTextField($user->profile,'address_postcode'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'address_street'); ?>
<?php echo CHtml::activeTextField($user->profile,'address_street'); ?>
</div>
<hr />
<div class="simple">
<?php echo CHtml::activeLabel($user,'notify_messages'); ?>
<?php echo CHtml::activeCheckBox($user,'notify_messages'); ?>
</div>

<?php if (Yii::app()->user->hasAuth(Group::ADMIN)) { ?>

<div class="simple">
<?php echo CHtml::activeLabel($user, 'company_id'); ?>
<?php echo CHtml::activeDropDownList($user, 'company_id', CHtml::listData(Companies::model()->getListed(), 'id', 'name')); ?>
</div>

<?php } ?>
<div class="action">
<?php echo CHtml::submitButton('Save'); ?>
</div>

</form>
</div><!-- yiiForm -->