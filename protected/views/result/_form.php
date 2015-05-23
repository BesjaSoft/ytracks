<div class="wide form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'result-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->hiddenField( $model, 'subround_id');?>
        <?php echo $form->labelEx($model,'subround_id'); ?>
        <?php $this->widget( 'zii.widgets.jui.CJuiAutoComplete'
                           , array( 'id'      => 'subround_id'
                                  , 'name'    => 'subround_id'
                                  , 'value'   => $model->subround->round->name.' '.$model->subround->start_date.'/'.$model->subround->subroundtype->name
                                  , 'source'  => $this->createUrl('subround/autoComplete')
                                  , 'options' => array( 'showAnim'  => 'fold'
                                                      , 'minLength' => 3
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Result_subround_id").val($selectedObject.id);}'
                                                      )
                                  , 'htmlOptions' => array('style' => 'width:300px')
                                  )
                           );?>
        <?php echo $form->error($model,'subround_id'); ?>
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
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Result_individual_id").val($selectedObject.id); }'
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
                                                      , 'select'    => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Result_team_id").val($selectedObject.id); }'
                                                      )
                                  )
                           );?>
        <?php echo $form->error($model,'team_id'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'participant_id'); ?>
        <?php echo $form->textField($model,'participant_id'); ?>
        <?php echo $form->error($model,'participant_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'raceclass_id'); ?>
		<?php echo $form->dropdownList($model,'raceclass_id',Raceclass::model()->findList(),array('prompt'=>'Select a Raceclass')); ?>
		<?php echo $form->error($model,'raceclass_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		<?php echo $form->textField($model,'rank'); ?>
		<?php echo $form->error($model,'rank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'classification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'performance'); ?>
		<?php echo $form->textField($model,'performance',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'performance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laps'); ?>
		<?php echo $form->textField($model,'laps'); ?>
		<?php echo $form->error($model,'laps'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bonus_points'); ?>
		<?php echo $form->textField($model,'bonus_points'); ?>
		<?php echo $form->error($model,'bonus_points'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shared_drive'); ?>
		<?php echo $form->checkBox($model,'shared_drive'); ?>
		<?php echo $form->error($model,'shared_drive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'make_id'); ?>
        <?php echo $form->dropDownList(  $model
                                      , 'make_id'
                                      , Make::model()->findList()
                                      , array( 'prompt'=>'Select a Make..'
                                             , 'ajax'  =>array ( 'type'   => 'POST' //request type
                                                               , 'url'    => Yii::app()->baseUrl.'/index.php?r=result/gettypes' //url to call
                                                               , 'update' => '#Result_type_id' //selector to update
                                                               )
                                             )
                                      );
        ?>
		<?php echo $form->error($model,'make_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
        <?php echo $form->dropDownList( $model
                                      , 'type_id'
                                      , Type::model()->findList('make_id = :make',array(':make'=> $model->make_id))
                                      , array( 'prompt'=>'Select a Type'
                                             , 'ajax'  =>array ( 'type'   => 'POST' //request type
                                                               , 'url'    => Yii::app()->baseUrl.'/index.php?r=result/getvehicles' //url to call
                                                               , 'update' => '#Result_vehicle_id' //selector to update
                                                               )
                                             )
                                      ); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_id'); ?>
        <?php echo $form->dropDownList ( $model
                                       , 'vehicle_id'
                                       , Vehicle::model()->findList('type_id = :type',array(':type'=> $model->type_id))
                                       , array( 'prompt'=>'Select a Vehicle' )
                                       ); ?>
		<?php echo $form->error($model,'vehicle_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine_id'); ?>
		<?php echo $form->dropdownList($model,'engine_id',Engine::model()->findList(),array('prompt'=>'Select an Engine')); ?>
		<?php echo $form->error($model,'engine_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tyre_id'); ?>
        <?php echo $form->dropDownList ( $model, 'tyre_id', Tyre::model()->findList(), array( 'prompt' => 'Select a Tyre' )); ?>
		<?php echo $form->error($model,'tyre_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'outreason_id'); ?>
        <?php echo CHtml::activeDropDownList ( $model
                                             , 'outreason_id'
                                             , Outreason::model()->findList()
                                             , array( 'prompt' => 'Select an Outreason' )
                                             ); ?>
		<?php echo $form->error($model,'outreason_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tresult_id'); ?>
		<?php echo $form->textField($model,'tresult_id'); ?>
		<?php echo $form->error($model,'tresult_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->