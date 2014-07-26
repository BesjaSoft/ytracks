<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'engine-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->hiddenField( $model, 'make_id');?>
        <?php echo $form->labelEx($model,'make_id'); ?>
        <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                           , array( 'id'      => 'make_id'
                                  , 'name'    => 'make_id'
                                  , 'value'   => $model->make->name
                                  , 'source'  => $this->createUrl('make/autoComplete')
                                  , 'options' => array( 'showAnim'  => 'fold'
                                                      , 'minLength' => 3
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_make_id").val($selectedObject.id);}'
                                                      )
                                  )
                           );?>
        <?php echo $form->error($model,'make_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tuner_id'); ?>
		<?php echo $form->textField($model,'tuner_id'); ?>
		<?php echo $form->error($model,'tuner_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enginetype_id'); ?>
        <?php echo $form->dropDownList( $model
                                      , 'enginetype_id'
                                      , Enginetype::model()->findList()
                                      , array( 'prompt'=>'Select an Enginetype..')
                                      );
                                      ?>
		<?php echo $form->error($model,'enginetype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compression'); ?>
		<?php echo $form->textField($model,'compression',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'compression'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cams'); ?>
		<?php echo $form->textField($model,'cams'); ?>
		<?php echo $form->error($model,'cams'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valves_cylinder'); ?>
		<?php echo $form->textField($model,'valves_cylinder'); ?>
		<?php echo $form->error($model,'valves_cylinder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bore'); ?>
		<?php echo $form->textField($model,'bore',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'bore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stroke'); ?>
		<?php echo $form->textField($model,'stroke',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'stroke'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capacity'); ?>
		<?php echo $form->textField($model,'capacity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'capacity'); ?>
        <?php echo $form->dropDownList( $model
                                      , 'capacity_id'
                                      , Volume::model()->findList()
                                      , array( 'prompt'=>'--option--')
                                      );
                                      ?>
		<?php echo $form->error($model,'capacity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'power'); ?>
		<?php echo $form->textField($model,'power',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'power'); ?>
        <?php echo $form->dropDownList( $model
                                      , 'power_id'
                                      , Power::model()->findList()
                                      , array( 'prompt'=>'--option--')
                                      );?>
		<?php echo $form->error($model,'power_id'); ?>
        at
   		<?php echo $form->textField($model,'power_revs'); ?>
		<?php echo $form->error($model,'power_revs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'torque'); ?>
		<?php echo $form->textField($model,'torque',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'torque'); ?>
        <?php echo $form->dropDownList( $model
                                      , 'torque_id'
                                      , Torque::model()->findList()
                                      , array( 'prompt'=>'--option--')
                                      );?>
		<?php echo $form->error($model,'torque_id'); ?>
        at
		<?php echo $form->textField($model,'torque_revs'); ?>
		<?php echo $form->error($model,'torque_revs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'induction'); ?>
		<?php echo $form->textField($model,'induction'); ?>
		<?php echo $form->error($model,'induction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ignition_id'); ?>
		<?php echo $form->textField($model,'ignition_id'); ?>
		<?php echo $form->error($model,'ignition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuelsystem_id'); ?>
		<?php echo $form->textField($model,'fuelsystem_id'); ?>
		<?php echo $form->error($model,'fuelsystem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->