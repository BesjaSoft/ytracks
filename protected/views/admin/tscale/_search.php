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
                <?php echo $form->label($model,'merk'); ?>
                <?php echo $form->textField($model,'merk',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'referentie'); ?>
                <?php echo $form->textField($model,'referentie',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'car'); ?>
                <?php echo $form->textField($model,'car',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'omschrijving'); ?>
                <?php echo $form->textField($model,'omschrijving',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'categorie'); ?>
                <?php echo $form->textField($model,'categorie',array('size'=>60,'maxlength'=>250)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'type_id'); ?>
                <?php echo $form->textField($model,'type_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'category_id'); ?>
                <?php echo $form->textField($model,'category_id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'deleted'); ?>
                <?php echo $form->checkBox($model,'deleted'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
