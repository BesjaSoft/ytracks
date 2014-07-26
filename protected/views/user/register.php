<h2>Registreerimine</h2>

<?php Yii::app()->user->getFlash('success', 'message_success'); ?>


<div class="yiiForm">
<?php echo CHtml::form(); ?>

<?php echo CHtml::errorSummary(array($user)); ?>

<div class="simple">
<?php echo CHtml::activeLabel($user,'username'); ?>
<?php echo CHtml::activeTextField($user,'username'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'password'); ?>
<?php echo CHtml::activePasswordField($user,'password'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'password_repeat'); ?>
<?php echo CHtml::activePasswordField($user,'password_repeat'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user,'email'); ?>
<?php echo CHtml::activeTextField($user,'email'); ?>
<p class="hint">Email will not be viewable by <b>anyone</b> but yourself.</p>
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
<?php echo CHtml::activeLabel($user->company,'company_name'); ?>
<?php echo CHtml::activeTextField($user->company,'name'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->company,'category_id'); ?>
<?php echo CHtml::activeDropDownList($user->company,'category_id', CHtml::listData(Categories::model()->getCategories("company"), "id", "title")); ?>
</div>

<hr />
<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'country_id'); ?>
<?php echo CHtml::activeDropDownList($user->profile,'country_id', Countries::findList()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($user->profile,'state_id'); ?>
<?php echo CHtml::activeTextField($user->profile,'state_id'); ?>
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

<div class="action">
<?php echo CHtml::submitButton('Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div><!-- yiiForm -->