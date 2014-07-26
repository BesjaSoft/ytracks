<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',

	'id'=>'ranking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'project_id'); ?>
        <?php echo $form->dropdownlist( $model
                                      , 'project_id'
                                      , Project::model()->findList()
                                      , array( 'prompt' => 'Select a Project..'
                                             , 'ajax' => array( 'type'=>'POST' //request type
                                                               , 'url'=>Yii::app()->baseUrl.'/index.php?r=ranking/getIndividuals' //url to call
                                                               , 'update'=>'#Ranking_individual_id' //selector to update
                                                               , //'data'=>'js:javascript statement'
                                                                  //leave out the data key to pass all form values through
                                                               )
                                             )
                                      ); ?>
        <?php echo $form->error($model,'project_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'individual_id'); ?>
		<?php echo $form->dropdownlist( $model
		                              , 'individual_id'
                                      , CHtml::listData( Individual::model()->with('participant')->findAll('participant.project_id=:project_id',
                                                            array(':project_id'=>(int) $model->project_id))
                                                       , 'id'
                                                       , 'full_name'
                                                       )
                                      , array( 'prompt'=>'Select an Individual'
                                             , 'ajax'  =>array ( 'type'=>'POST' //request type
                                                               , 'url'=>Yii::app()->baseUrl.'/index.php?r=ranking/getTeams' //url to call
                                                               , 'update'=>'#Ranking_team_id' //selector to update
                                                               , //'data'=>'js:javascript statement'
                                                                  //leave out the data key to pass all form values through
                                                               )
                                             )
		                              ); ?>
		<?php echo $form->error($model,'individual_id'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'team_id'); ?>
        <?php echo $form->dropdownlist( $model
                                      , 'team_id'
                                      , CHtml::listData( Team::model()->with('participant')->findAll('participant.project_id=:project_id and participant.individual_id = :individual_id',
                                                            array( ':project_id'    => (int) $model->project_id
                                                                 , ':individual_id' => (int) $model->individual_id))
                                                       , 'id'
                                                       , 'name'
                                                       )
                                      , array( 'prompt'=>'Select a Team' )
                                      ); ?>
		<?php echo $form->error($model,'team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rank'); ?>
		<?php echo $form->textField($model,'rank'); ?>
		<?php echo $form->error($model,'rank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'points'); ?>
		<?php echo $form->textField($model,'points',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'points'); ?>
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