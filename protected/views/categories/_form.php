<div class="yiiForm">

<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php echo CHtml::beginForm("", "post", array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'module'); ?>
<?php echo CHtml::activeDropDownList($model,'module', Categories::model()->getModules()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'title'); ?>
<?php echo CHtml::activeTextField($model,'title'); ?>
</div>
<?php if ($model->images->filename != ""){ ?>
<div class="simple">
    <?php 
        echo CHtml::activeLabelEx($model,'Vana pilt');
		echo CHtml::image(Yii::app()->baseUrl.substr($model->images->directory,1)."/".$model->images->filename);
		echo CHtml::hiddenField("image_id", $model->images->id);
    ?>
</div>
<?php } ?>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'fileImage'); ?>
<?php echo CHtml::activeFileField($model,'fileImage'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'is_newwindow'); ?>
<?php echo CHtml::activeCheckbox($model,'is_newwindow'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'is_active'); ?>
<?php echo CHtml::activeCheckbox($model,'is_active'); ?>
</div>


<div class="action">
<?php echo CHtml::submitButton($update ? Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->