<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'alias'); ?>
<?php echo CHtml::activeTextField($model,'alias',array('size'=>60,'maxlength'=>100)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'description'); ?>
<?php echo CHtml::activeTextArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'from'); ?>
<?php echo CHtml::activeTextField($model,'from',array('size'=>4,'maxlength'=>4)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'untill'); ?>
<?php echo CHtml::activeTextField($model,'untill',array('size'=>4,'maxlength'=>4)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'published'); ?>
<?php echo CHtml::activeTextField($model,'published'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'ordering'); ?>
<?php echo CHtml::activeTextField($model,'ordering'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'checked_out'); ?>
<?php echo CHtml::activeTextField($model,'checked_out'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'checked_out_time'); ?>
<?php echo CHtml::activeTextField($model,'checked_out_time'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'created'); ?>
<?php echo CHtml::activeTextField($model,'created'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'modified'); ?>
<?php echo CHtml::activeTextField($model,'modified'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'deleted'); ?>
<?php echo CHtml::activeTextField($model,'deleted'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'deleted_date'); ?>
<?php echo CHtml::activeTextField($model,'deleted_date'); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->