<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'code'); ?>
<?php echo CHtml::activeTextField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'make_id'); ?>
<?php echo CHtml::activeDropDownList(  $model
                                    , 'make_id'
                                    , CHtml::listData( Make::model()->findDropDownList()
                                                     , 'id'
                                                     , 'name' 
                                                     )
                                    , array( 'prompt'=>'Select a Make..'
                                           )
                                    ); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'published'); ?>
<?php echo CHtml::activeCheckBox($model,'published'); ?>
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

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->