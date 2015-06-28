<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm',
            array(
        'id' => 'round-form',
        'enableAjaxValidation' => true,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 200)); ?>
    <div class="form-group">
        <?php echo $form->hiddenField($model, 'event_id'); ?>
        <?php echo $form->labelEx($model, 'event_id', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete',
                    array('id' => 'event_id',
                'name' => 'event_id',
                'value' => isset($model->event_id) ? $model->event->name : $model->event_id,
                'source' => $this->createUrl('event/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 3,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Round_event_id").val($selectedObject.id);}'
                ),
                'htmlOptions' => array('class' => 'form-control')
            ));
            ?>
            <?php echo $form->error($model, 'event_id'); ?>
        </div>
    </div>
    <?php
    echo $form->dropDownListGroup($model, 'project_id',
            array(
        'widgetOptions' => array(
            'data' => Project::model()->findList(),
            'prompt' => '-- Project --')
    ));
    ?>
    <?php
    echo $form->dropDownListGroup($model, 'circuit_id',
            array(
        'widgetOptions' => array(
            'data' => Circuit::model()->findList(),
            'prompt' => '-- Circuit --'
        ))
    );
    ?>

    <?php echo $form->textFieldGroup($model, 'ordering'); ?>
    <?php echo $form->textFieldGroup($model, 'laps'); ?>
    <?php echo $form->textFieldGroup($model, 'length', array('size' => 10, 'maxlength' => 10)); ?>
    <?php
    echo $form->dropDownListGroup($model, 'distance_id',
            array('widgetOptions' => array('data' => Distance::model()->findList(), 'prompt' => '-- Distance --')));
    ?>
    <?php
    echo $form->datePickerGroup($model, 'start_date',
            array('widgetOptions' => array(
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
    echo $form->datePickerGroup($model, 'end_date',
            array('widgetOptions' => array(
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