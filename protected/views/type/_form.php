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
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Type_make_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('class' => 'form-control')
        ));
        ?>
        <?php echo $form->error($model, 'make_id'); ?>
    </div>
</div>

<?php echo $form->textFieldGroup($model, 'name', array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->textFieldGroup($model, 'alias', array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->textFieldGroup($model, 'description', array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php echo $form->textFieldGroup($model, 'chassiscode', array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
<?php
echo $form->dropDownListGroup($model, 'cartype_id',
        array('widgetOptions' => array('data' => Cartype::model()->findList(), prompt => '-- Cartype --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>
<?php
echo $form->dropDownListGroup($model, 'constructor_id',
        array('widgetOptions' => array('data' => Constructor::model()->findList(), prompt => '-- Constructor --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>
<?php
echo $form->dropDownListGroup($model, 'bodywork_id',
        array('widgetOptions' => array('data' => Bodywork::model()->findList(), prompt => '-- Bodywork --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>

<?php echo $form->textFieldGroup($model, 'from', array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>
<?php echo $form->textFieldGroup($model, 'untill', array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>

<?php
echo $form->dropDownListGroup($model, 'engineposition_id',
        array('widgetOptions' => array('data' => Engineposition::model()->findList(), prompt => '-- Engineposition --'),
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>

<?php
echo $form->dropDownListGroup($model, 'propulsion_id',
        array('widgetOptions' => array('data' => Propulsion::model()->findList(), prompt => '-- Propulsion --'), 'wrapperHtmlOptions' => array(
        'class' => 'col-sm-6')));
?>

<?php echo $form->textFieldGroup($model, 'topspeed', array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'length', array('class' => 'col-sm-3 control-label')); ?>
    <div>
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'length', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'length_id', Distance::model()->findList(),
                    array('prompt' => '-- Length --', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'length_id'); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'width', array('class' => 'col-sm-3 control-label')); ?>
    <div>
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'width', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'width_id', Distance::model()->findList(),
                    array('prompt' => '-- Width --', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'width_id'); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'height', array('class' => 'col-sm-3 control-label')); ?>
    <div>
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'height', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'height_id', Distance::model()->findList(),
                    array('prompt' => '-- Height --', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'height_id'); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'weight', array('class' => 'col-sm-3 control-label')); ?>
    <div>
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'weight', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'weight_id', Weight::model()->findList(),
                    array('prompt' => '-- weight --', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'weight_id'); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'wheelbase', array('class' => 'col-sm-3 control-label')); ?>
    <div>
        <div class="col-sm-2">
            <?php
            echo $form->textField($model, 'wheelbase', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control'));
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            echo $form->dropDownList($model, 'wheelbase_id', Distance::model()->findList(),
                    array('prompt' => '-- wheelbase --', 'class' => 'form-control')
            );
            ?>
            <?php echo $form->error($model, 'wheelbase_id'); ?>
        </div>
    </div>
</div>

<?php echo $form->textFieldGroup($model, 'spoorbreedte_voor',
        array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>
<?php echo $form->textFieldGroup($model, 'spoorbreedte_achter',
        array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>
<?php echo $form->textFieldGroup($model, 'production_number',
        array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>
        <?php echo $form->checkBoxGroup($model, 'published'); ?>
        <?php echo $form->textFieldGroup($model, 'ordering',
                array('wrapperHtmlOptions' => array('class' => 'col-sm-2'))); ?>
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

