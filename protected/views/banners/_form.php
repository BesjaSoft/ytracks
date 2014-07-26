<div class="yiiForm">

<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php echo CHtml::beginForm("", "post", array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::errorSummary($model); ?>

<?php if ($model->image->filename != ""){ ?>
<div class="simple"><?php 
    echo CHtml::activeLabelEx($model,'Vana pilt');
		echo CHtml::image(Yii::app()->baseUrl.substr($model->image->directory,1)."/".$model->image->filename);
		echo CHtml::hiddenField("image_id", $model->image->id);
		echo "<br />";
?></div>
<?php }  ?>
<div class="simple">
<?php echo CHtml::activeLabelEx($file,'myfile'); ?>
<?php echo CHtml::activeFileField($file,'myfile'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'type'); ?>
<?php echo CHtml::activeDropDownList($model,'type', Banners::model()->getBannerTypes()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'user_id'); ?>
<?php echo CHtml::activeDropDownList($model,'user_id', CHtml::listData(User::model()->getUsers(), "id", "lastname"), array("prompt" => "POLE KLIENTI")); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'url'); ?>
<?php echo CHtml::activeTextArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'showalltime'); ?>
<?php echo CHtml::activeCheckBox($model,'showalltime'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'date_showstart'); ?>
<?php echo CHtml::activeTextField($model,'date_showstart', array("class" => "wdate", "value" => date("d.m.Y", $model->date_showstart) )); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'date_showend'); ?>
<?php echo CHtml::activeTextField($model,'date_showend', array("class" => "wdate", "value" => date("d.m.Y", $model->date_showend))); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'status'); ?>
<?php echo CHtml::activeDropDownList($model,'status', Banners::model()->getStatusOptions()); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->