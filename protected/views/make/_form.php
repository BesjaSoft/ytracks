<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',
        array(
            'type'=>'horizontal',
            'id'=>'make-form',
            'enableAjaxValidation'=>false,
        )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>100)); ?>
    <?php echo $form->textFieldRow($model,'alias',array('size'=>50,'maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'code',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'code'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->hiddenField( $model, 'founder_id');?>
        <?php echo $form->labelEx    ( $model, 'founder_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                               , array( 'id'      => 'founder_id'
                                      , 'name'    => 'founder_id'
                                      , 'value'   => $model->individual->full_name
                                      , 'source'  => $this->createUrl('individual/autoComplete')
                                      , 'options' => array( 'showAnim'  => 'fold'
                                                          , 'minLength' => 3
                                                          , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Make_founder_id").val($selectedObject.id);}'
                                                          )
                                      )
                               ) ;?>
            <?php echo $form->error($model,'founder_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model,'logo',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'ordering'); ?>
    <?php echo $form->textFieldRow($model,'checked_out'); ?>
    <?php echo $form->checkBoxRow($model,'published'); ?>


    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->