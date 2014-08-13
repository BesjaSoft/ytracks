<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'vehicle-form',
	'enableAjaxValidation'=>true,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well'),
)); ?>

	<p class="warning">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
        <?php echo $form->hiddenField( $model, 'type_id');?>
        <?php echo $form->labelEx($model,'type_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                               , array( 'id'      => 'type_id'
                                      , 'name'    => 'type_id'
                                      , 'value'   => isset($model->type_id) ? $model->type->fullname : $model->type_id
                                      , 'source'  => $this->createUrl('type/autoComplete')
                                      , 'options' => array( 'showAnim'  => 'fold'
                                                          , 'minLength' => 3
                                                          , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Vehicle_type_id").val($selectedObject.id);}'
                                                          )
                                      )
                               );?>
            <?php echo $form->error($model,'type_id'); ?>
        </div>
	</div>

	<?php echo $form->textFieldRow($model,'reference',array('size'=>10,'maxlength'=>10)); ?>
	<?php echo $form->textFieldRow($model,'chassisnumber',array('size'=>50,'maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'year',array('size'=>8,'maxlength'=>8)); ?>
	<?php echo $form->textFieldRow($model,'color_id'); ?>
	<?php echo $form->textFieldRow($model,'condition_id'); ?>
	<?php echo $form->textFieldRow($model,'modifications',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'licenseplate',array('size'=>20,'maxlength'=>20)); ?>
	<?php echo $form->textFieldRow($model,'remarks',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'bodywork_id'); ?>
	<?php echo $form->textFieldRow($model,'carrosseriesoort_id'); ?>
	<?php echo $form->textFieldRow($model,'model',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'options',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'history',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'engine',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'group',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'first_owner',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'next_owners',array('size'=>60,'maxlength'=>500)); ?>
	<?php echo $form->textFieldRow($model,'carrossier',array('size'=>60,'maxlength'=>250)); ?>
	<?php echo $form->textAreaRow($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->checkBoxRow($model,'published'); ?>
	<?php echo $form->textFieldRow($model,'ordering'); ?>

    <div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->