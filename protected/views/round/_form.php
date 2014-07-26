<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'round-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well')
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 200)); ?>
    <?php
    echo $form->dropDownListRow($model
            , 'event_id'
            , Event::model()->findList()
            , array('prompt' => 'Select an Event..')
    );
    ?>
    <?php
    echo $form->dropDownListRow($model
            , 'project_id'
            , Project::model()->findList()
            , array('prompt' => 'Select a Project..')
    );
    ?>
    <?php
    echo $form->dropDownListRow($model
            , 'circuit_id'
            , Circuit::model()->findList()
            , array('prompt' => 'Select a Circuit..')
    );
    ?>

    <?php echo $form->textFieldRow($model, 'ordering'); ?>
    <?php echo $form->textFieldRow($model, 'laps'); ?>
    <?php echo $form->textFieldRow($model, 'length', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->dropDownListRow($model, 'distance_id', Distance::model()->findList(), array('prompt' => 'Distance..')); ?>
    <?php echo $form->textFieldRow($model, 'start_date'); ?>
    <?php echo $form->textFieldRow($model, 'end_date'); ?>
    <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textAreaRow($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->checkBoxRow($model, 'published'); ?>
    <?php echo $form->textFieldRow($model, 'manches'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->