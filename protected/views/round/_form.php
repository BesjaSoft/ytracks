<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'round-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 200)); ?>
    <?php
    echo $form->dropDownListGroup($model, 'event_id', array(
        'widgetOptions' => array(
            'data' => Event::model()->findList(),
            'prompt' => '-- Event --')
    ));
    ?>
    <?php
    echo $form->dropDownListGroup($model, 'project_id', array(
        'widgetOptions' => array(
            'data' => Project::model()->findList(),
            'prompt' => '-- Project --')
    ));
    ?>
    <?php
    echo $form->dropDownListGroup($model, 'circuit_id', array(
        'widgetOptions' => array(
            Circuit::model()->findList(),
            'prompt' => '-- Circuit --'
        ))
    );
    ?>

    <?php echo $form->textFieldGroup($model, 'ordering'); ?>
    <?php echo $form->textFieldGroup($model, 'laps'); ?>
    <?php echo $form->textFieldGroup($model, 'length', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->dropDownListGroup($model, 'distance_id', array('widgetOptions' => array('data' => Distance::model()->findList(), 'prompt' => '-- Distance --'))); ?>
    <?php
    echo $form->datePickerGroup($model, 'start_date', array('widgetOptions' => array(
            'options' => array(
                'language' => 'en',
                'format' => 'yyyy-mm-dd',
                'startdate' => $model->start_date
            ),
        ), 'wrapperHtmlOptions' => array('class' => 'col-sm-5'),
        'options' => array('format' => 'yyyy-mm-dd'),
        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'));
    ?>
    <?php
    echo $form->datePickerGroup($model, 'end_date', array('widgetOptions' => array(
            'options' => array(
                'language' => 'en',
                'format' => 'yyyy-mm-dd',
                'startdate' => $model->end_date
            ),
        ), 'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
        'options' => array('format' => 'yyyy-mm-dd'),
        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'));
    ?>
    <?php echo $form->textAreaGroup($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textAreaGroup($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->checkBoxGroup($model, 'published'); ?>
    <?php echo $form->textFieldGroup($model, 'manches'); ?>

    <div class="form-actions">
        <div class="col-sm-offset-3">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->