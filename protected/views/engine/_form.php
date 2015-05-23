<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'id' => 'engine-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="control-group">
        <?php echo $form->hiddenField($model, 'make_id'); ?>
        <?php echo $form->labelEx($model, 'make_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array('id' => 'make_id',
                'name' => 'make_id',
                'value' => isset($model->make_id) ? $model->make->name : $model->make_id,
                'source' => $this->createUrl('make/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 2,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_make_id").val($selectedObject.id);}'
                )
                    )
            );
            ?>
            <?php echo $form->error($model, 'make_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldGroup($model, 'description', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldGroup($model, 'code', array('size' => 20, 'maxlength' => 20)); ?>
    <div class="control-group">
        <?php echo $form->hiddenField($model, 'parent_id'); ?>
        <?php echo $form->labelEx($model, 'parent_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array('id' => 'parent_id',
                'name' => 'parent_id',
                'value' => isset($model->parent_id) ? $model->parent->fullname : $model->parent_id,
                'source' => $this->createUrl('engine/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 3,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_parent_id").val($selectedObject.id);}'
                )
                    )
            );
            ?>
            <?php echo $form->error($model, 'make_id'); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->hiddenField($model, 'tuner_id'); ?>
        <?php echo $form->labelEx($model, 'tuner_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array('id' => 'tuner_id',
                'name' => 'make_id',
                'value' => isset($model->tuner_id) ? $model->tuner->name : $model->tuner_id,
                'source' => $this->createUrl('tuner/autoComplete'),
                'options' => array('showAnim' => 'fold',
                    'minLength' => 3,
                    'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_tuner_id").val($selectedObject.id);}'
                )
                    )
            );
            ?>
            <?php echo $form->error($model, 'make_id'); ?>
        </div>
    </div>
    <?php echo $form->dropDownListGroup($model, 'enginetype_id', Enginetype::model()->findList(), array('prompt' => 'Select an Enginetype..')); ?>
    <?php echo $form->textFieldGroup($model, 'compression', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'cams'); ?>
    <?php echo $form->textFieldGroup($model, 'valves_cylinder'); ?>
    <?php echo $form->textFieldGroup($model, 'bore', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'stroke', array('size' => 10, 'maxlength' => 10)); ?>


    <div class="control-group">
        <?php echo $form->labelEx($model, 'capacity', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'capacity', array('size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'capacity'); ?>
            <?php
            echo $form->dropDownList($model
                    , 'capacity_id'
                    , Volume::model()->findList()
                    , array('prompt' => '--option--')
            );
            ?>
            <?php echo $form->error($model, 'capacity_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'power', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'power', array('size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'power'); ?>
            <?php
            echo $form->dropDownList($model
                    , 'power_id'
                    , Power::model()->findList()
                    , array('prompt' => '--option--')
            );
            ?>
            <?php echo $form->error($model, 'power_id'); ?>
            at
            <?php echo $form->textField($model, 'power_revs'); ?>
            <?php echo $form->error($model, 'power_revs'); ?>
        </div>

    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'torque', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'torque', array('size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'torque'); ?>
            <?php
            echo $form->dropDownList($model
                    , 'torque_id'
                    , Torque::model()->findList()
                    , array('prompt' => '--option--')
            );
            ?>
            <?php echo $form->error($model, 'torque_id'); ?>
            at
            <?php echo $form->textField($model, 'torque_revs'); ?>
            <?php echo $form->error($model, 'torque_revs'); ?>
        </div>
    </div>

    <?php echo $form->textFieldGroup($model, 'induction'); ?>
    <?php echo $form->textFieldGroup($model, 'ignition_id'); ?>
    <?php echo $form->textFieldGroup($model, 'fuelsystem_id'); ?>
    <?php echo $form->checkBoxGroup($model, 'published'); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>

    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton', array('buttonType' => 'submit', 'context' => 'primary', 'label' => $model->isNewRecord ? 'Create' : 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->