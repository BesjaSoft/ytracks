<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'filename'); ?>
                <?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'tmake'); ?>
                <?php echo $form->textField($model,'tmake',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'ttype'); ?>
                <?php echo $form->textField($model,'ttype',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'chassis'); ?>
                <?php echo $form->textField($model,'chassis',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'tengine'); ?>
                <?php echo $form->textField($model,'tengine',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'year'); ?>
                <?php echo $form->textField($model,'year',array('size'=>20,'maxlength'=>20)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'group'); ?>
                <?php echo $form->textField($model,'group',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'first_owner'); ?>
                <?php echo $form->textField($model,'first_owner',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'next_owners'); ?>
                <?php echo $form->textField($model,'next_owners',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'comment'); ?>
                <?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'make_id'); ?>
                <?php echo $form->textField($model,'make_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'type_id'); ?>
                <?php echo $form->textField($model,'type_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'vehicle_id'); ?>
                <?php echo $form->textField($model,'vehicle_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'published'); ?>
                <?php echo $form->checkBox($model,'published'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'ordering'); ?>
                <?php echo $form->textField($model,'ordering'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'checked_out'); ?>
                <?php echo $form->textField($model,'checked_out'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'checked_out_time'); ?>
                <?php echo $form->textField($model,'checked_out_time'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'created'); ?>
                <?php echo $form->textField($model,'created'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'modified'); ?>
                <?php echo $form->textField($model,'modified'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'deleted'); ?>
                <?php echo $form->checkBox($model,'deleted'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'deleted_date'); ?>
                <?php echo $form->textField($model,'deleted_date'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
