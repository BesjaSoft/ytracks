<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?></p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'to_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'to_id', CHtml::listData(User::model()->getUsers(), "id", "name"), array("prompt" => Yii::t("general", "TXT_CHOOSE") )); ?>
		<?php echo CHtml::error($model,'to_id'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'to_email'); ?>
		<?php echo CHtml::activeTextField($model,'to_email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'to_email'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'subject'); ?>
		<?php echo CHtml::activeTextField($model,'subject', array("size" => "70px")); ?>
		<?php echo CHtml::error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'message'); ?>
		<?php echo CHtml::activeTextArea($model,'message',array('rows'=>15, 'cols'=>50)); ?>
		<?php echo CHtml::error($model,'message'); ?>
	</div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br />
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t("general", "BTN_SEND")); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->