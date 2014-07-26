<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'participant-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'project_id'); ?>
        <?php echo $form->dropdownlist( $model
                                      , 'project_id'
                                      , CHtml::listData( Project::model()->findAll()
                                                       , 'id'
                                                       , 'name'
                                                       )
                                      , array( 'prompt'=>'Select a Project..' )
                                      ); ?>
        <?php echo $form->error($model,'project_id'); ?>
    </div>

	<div class="row">
        <?php echo $form->labelEx($model,'individual_id'); ?>
        <?php echo $form->hiddenField($model, 'individual_id');?>
        <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                           , array( 'id'      => 'individual_id'
                                  , 'name'    => 'individual_id'
                                  , 'value'   => $model->individual->full_name
                                  , 'source'  => $this->createUrl('individual/autoComplete')
                                  , 'options' => array( 'showAnim'  => 'fold'
                                                      , 'minLength' => 3
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Participant_individual_id").val($selectedObject.id); }'
                                                      )
                                  )
                           );?>
        <?php echo $form->error($model,'individual_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_id'); ?>
        <?php echo $form->hiddenField($model, 'team_id');?>
        <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                           , array( 'id'      => 'team_id'
                                  , 'name'    => 'team_id'
                                  , 'value'   => $model->team->name
                                  , 'source'  => $this->createUrl('team/autoComplete')
                                  , 'options' => array( 'showAnim'  => 'fold'
                                                      , 'minLength' => 3
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Participant_team_id").val($selectedObject.id); }'
                                                      )
                                  )
                           );?>
		<?php echo $form->error($model,'team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'initial_points'); ?>
		<?php echo $form->textField($model,'initial_points'); ?>
		<?php echo $form->error($model,'initial_points'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'raceclass_id'); ?>
		<?php echo $form->textField($model,'raceclass_id'); ?>
		<?php echo $form->error($model,'raceclass_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->