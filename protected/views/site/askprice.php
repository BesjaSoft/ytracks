<?php $this->pageTitle=Yii::app()->name . ' - Contact Us'; ?>

<h1><?php echo Yii::t("site", "SITE_CONTACT_TITLE"); ?></h1>

<?php

if(Yii::app()->user->hasFlash('success')) {
	Yii::app()->user->flash('success', array('<div class="confirmation">', '</div>'));
	return;
}

if(Yii::app()->user->hasFlash('failed')) {
	Yii::app()->user->flash('failed', array('<div class="failed">', '</div>'));
	return;
}

?>

<div class="yiiForm">
<?php echo CHtml::form("", "post", array("class" => "nyroModal")); ?>

<?php echo CHtml::errorSummary($contact); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($contact,'name'); ?>
<?php echo CHtml::activeTextField($contact,'name'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($contact,'email'); ?>
<?php echo CHtml::activeTextField($contact,'email'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($contact,'subject'); ?>
<?php 
echo CHtml::activeTextField($contact,'subject',array('size'=>60,'maxlength'=>128, "value" => CHtml::encode("Hinnapäring: ".$image->title) )); ?>
</div>

<div class="simple">
    <?php echo CHtml::label('Pildi nimi',""); ?>
    <?php echo "<strong>Soovin lisainfot pildi(de) kohta: ".$image->original_filename."</strong>"; ?>
    </div>
    
<div class="simple">
<?php echo CHtml::activeLabelEx($contact,'body'); ?>
<?php 

//$message = "Tere, \n\n";
$message = "...kirjuta siia oma tekst, sh pildi kasutuseesmärk ...\n\n";
//$message .= "\n\nEttetänades";
 
$contact->body = $message;

// hidden filed for images
$images = array();
$images[]  = $image->original_filename;

echo CHtml::activeHiddenField($contact, "attachments", array("value" => serialize($images)) );


echo CHtml::activeTextArea($contact,'body',array('rows'=>6, 'cols'=>50)); ?>
</div>

<?php if(extension_loaded('gd')){ ?>
<div class="simple">
	<?php echo CHtml::activeLabelEx($contact,'verifyCode'); ?>
	<div>
	<?php $this->widget('CCaptcha'); ?>
	<?php echo CHtml::activeTextField($contact,'verifyCode'); ?>
	</div>
	<p class="hint"><?php echo Yii::t("site", "SITE_VERIFICATIONHELP"); ?></p>
</div>
<?php } ?>

<div class="action">
<?php echo CHtml::submitButton(Yii::t("general", "BTN_SEND")); ?>
</div>

</form>
</div><!-- yiiForm -->