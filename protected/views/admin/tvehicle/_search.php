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
                <?php echo $form->label($model,'tvehicle'); ?>
                <?php echo $form->textField($model,'tvehicle',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'tchassis'); ?>
                <?php echo $form->textField($model,'tchassis',array('size'=>50,'maxlength'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'tlicenseplate'); ?>
                <?php echo $form->textField($model,'tlicenseplate',array('size'=>50,'maxlength'=>50)); ?>
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
                <?php echo $form->label($model,'done'); ?>
                <?php echo $form->textField($model,'done'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'created'); ?>
                <?php echo $form->textField($model,'created'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'modified'); ?>
                <?php echo $form->textField($model,'modified'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
