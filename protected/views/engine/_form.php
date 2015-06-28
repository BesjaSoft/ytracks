<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm',
        array(
    'type' => 'horizontal',
    'id' => 'engine-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-horizontal well')
        ));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->hiddenField($model, 'make_id'); ?>
    <?php echo $form->labelEx($model, 'make_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-6">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array('id' => 'make_id',
            'name' => 'make_id',
            'value' => $model->make->name,
            'source' => $this->createUrl('make/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 2,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_make_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('class' => 'form-control')
        ));
        ?>
        <?php echo $form->error($model, 'make_id'); ?>
    </div>
</div>


<?php echo $form->textFieldGroup($model, 'name',
        array('size' => 60, 'maxlength' => 100, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->textFieldGroup($model, 'alias',
        array('size' => 60, 'maxlength' => 100, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->textFieldGroup($model, 'description',
        array('size' => 60, 'maxlength' => 255, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
    <?php echo $form->textFieldGroup($model, 'code',
            array('size' => 20, 'maxlength' => 20, 'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>

<div class="form-group">
        <?php echo $form->hiddenField($model, 'parent_id'); ?>
        <?php echo $form->labelEx($model, 'parent_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-6">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array('id' => 'parent_id',
            'name' => 'parent_id',
            'value' => isset($model->parent_id) ? $model->parent->fullname : $model->parent_id,
            'source' => $this->createUrl('engine/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 3,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_parent_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('class' => 'form-control')
        ));
        ?>
    <?php echo $form->error($model, 'parent_id'); ?>
    </div>
</div>
<div class="form-group">
        <?php echo $form->hiddenField($model, 'tuner_id'); ?>
        <?php echo $form->labelEx($model, 'tuner_id', array('class' => 'col-sm-3 control-label')); ?>
    <div class="col-sm-6">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array('id' => 'tuner_id',
            'name' => 'tuner_id',
            'value' => isset($model->tuner_id) ? $model->tuner->name : $model->tuner_id,
            'source' => $this->createUrl('tuner/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 3,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Engine_tuner_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('class' => 'form-control')
        ));
        ?>
<?php echo $form->error($model, 'tuner_id'); ?>
    </div>
</div>
<?php
echo $form->dropDownListGroup($model, 'enginetype_id',
        array('widgetOptions' => array('data' => Enginetype::model()->findList(), 'prompt' => '-- Engine type --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>
<?php echo $form->textFieldGroup($model, 'compression', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'cams'); ?>
    <?php echo $form->textFieldGroup($model, 'valves_cylinder'); ?>
    <?php echo $form->textFieldGroup($model, 'bore', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'stroke', array('size' => 10, 'maxlength' => 10)); ?>


<div class="form-group">
            <?php echo $form->labelEx($model, 'capacity', array('class' => 'col-sm-3 control-label')); ?>
    <div>
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'capacity', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
            <?php echo $form->error($model, 'capacity'); ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'capacity_id', Volume::model()->findList(),
                    array('prompt' => '--option--', 'class' => 'form-control')
            );
            ?>
    <?php echo $form->error($model, 'capacity_id'); ?>
        </div>
    </div>
</div>

<div class="form-group">
            <?php echo $form->labelEx($model, 'power', array('class' => 'col-sm-3 control-label')); ?>
    <div> 
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'power', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
            <?php echo $form->error($model, 'power'); ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'power_id', Power::model()->findList(),
                    array('prompt' => '--option--', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'power_id'); ?>
        </div>
        <div class="col-sm-2 input-group">
            <span class="input-group-addon">@</span>
<?php echo $form->textField($model, 'power_revs', array('class' => 'form-control')); ?>
<?php echo $form->error($model, 'power_revs'); ?>
            <span class="input-group-addon">RPM</span>
        </div>
    </div>
</div>

<div class="form-group">
            <?php echo $form->labelEx($model, 'torque', array('class' => 'col-sm-3 control-label')); ?>
    <div> 
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'torque', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
            <?php echo $form->error($model, 'torque'); ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model
                    , 'torque_id'
                    , Torque::model()->findList()
                    , array('prompt' => '--option--', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'torque_id'); ?>
        </div>
        <div class="col-sm-2 input-group">
            <span class="input-group-addon">@</span>
<?php echo $form->textField($model, 'torque_revs', array('class' => 'form-control')); ?>
<?php echo $form->error($model, 'torque_revs'); ?>
            <span class="input-group-addon">RPM</span>
        </div>
    </div>
</div>

<?php echo $form->textFieldGroup($model, 'induction', array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->dropDownlistGroup($model, 'ignition_id',
        array('widgetOptions' => array('data' => Ignition::model()->findList(), 'prompt' => '-- Ignition --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>
<?php echo $form->dropDownlistGroup($model, 'fuelsystem_id',
        array('widgetOptions' => array('data' => Fuelsystem::model()->findList(), 'prompt' => '-- Fuelsystem --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>
        <?php echo $form->checkBoxGroup($model, 'published'); ?>
        <?php echo $form->textFieldGroup($model, 'ordering'); ?>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
<?php
$this->widget(
        'booster.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => $model->isNewRecord ? 'Create' : 'Save', 'context' => 'primary')
);
?>
    </div>
</div>
<?php $this->endWidget(); ?>
