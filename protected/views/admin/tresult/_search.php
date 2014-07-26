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
                <?php echo $form->label($model,'round'); ?>
                <?php echo $form->textField($model,'round',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'num'); ?>
                <?php echo $form->textField($model,'num',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'individuals'); ?>
                <?php echo $form->textArea($model,'individuals',array('rows'=>6, 'cols'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'tvehicle'); ?>
                <?php echo $form->textField($model,'tvehicle',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'tteam'); ?>
                <?php echo $form->textField($model,'tteam',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'laps'); ?>
                <?php echo $form->textField($model,'laps',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'performance'); ?>
                <?php echo $form->textField($model,'performance',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'classification'); ?>
                <?php echo $form->textField($model,'classification',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'raceclass'); ?>
                <?php echo $form->textField($model,'raceclass',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'grid'); ?>
                <?php echo $form->textField($model,'grid',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'laptime'); ?>
                <?php echo $form->textField($model,'laptime',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'Livery'); ?>
                <?php echo $form->textField($model,'Livery',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'Field4Question'); ?>
                <?php echo $form->textField($model,'Field4Question',array('size'=>10,'maxlength'=>10)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'Field4Or'); ?>
                <?php echo $form->textField($model,'Field4Or',array('size'=>10,'maxlength'=>10)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'Field4Evo'); ?>
                <?php echo $form->textField($model,'Field4Evo',array('size'=>10,'maxlength'=>10)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'Field4_2'); ?>
                <?php echo $form->textField($model,'Field4_2',array('size'=>10,'maxlength'=>10)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'subround_id'); ?>
                <?php echo $form->textField($model,'subround_id'); ?>
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
                <?php echo $form->label($model,'engine_id'); ?>
                <?php echo $form->textField($model,'engine_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'team_id'); ?>
                <?php echo $form->textField($model,'team_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'deleted'); ?>
                <?php echo $form->checkBox($model,'deleted'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'error'); ?>
                <?php echo $form->checkBox($model,'error'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
