<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'id' => 'type-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'well')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model, 'make_id'); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'make_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete'
                    , array('id' => 'make_id'
                , 'name' => 'make_id'
                , 'value' => $model->make->name
                , 'source' => $this->createUrl('make/autoComplete')
                , 'options' => array('showAnim' => 'fold'
                    , 'minLength' => 2
                    , 'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Type_make_id").val($selectedObject.id);}'
                )
                    )
            );
            ?>
            <?php echo $form->error($model, 'make_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'name', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'alias', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldRow($model, 'description', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($model, 'chassiscode', array('size' => 20, 'maxlength' => 20)); ?>
    <?php
    echo $form->dropDownListRow($model
            , 'cartype_id'
            , Cartype::model()->findList()
            , array('prompt' => 'Select a Cartype..')
    );
    ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'constructor_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            echo $form->dropDownList($model
                    , 'constructor_id'
                    , Constructor::model()->findList()
                    , array('prompt' => 'Select a Constructor..')
            );
            ?>
            <?php echo $form->error($model, 'constructor_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'bodywork_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            echo $form->dropDownList($model, 'bodywork_id', Bodywork::model()->findList(), array('prompt' => 'Select a Bodywork..')
            );
            ?>
            <?php echo $form->error($model, 'bodywork_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'from', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'untill', array('size' => 10, 'maxlength' => 10)); ?>


    <div class="control-group">
        <?php echo $form->labelEx($model, 'engineposition_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            echo CHtml::activeDropDownList($model
                    , 'engineposition_id'
                    , Engineposition::model()->findList()
                    , array('prompt' => 'Select an Engineposition..')
            );
            ?>
            <?php echo $form->error($model, 'engineposition_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'propulsion_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            echo $form->dropDownList($model
                    , 'propulsion_id'
                    , Propulsion::model()->findList()
                    , array('prompt' => 'Select a Propulsion..')
            );
            ?>
            <?php echo $form->error($model, 'propulsion_id'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'topspeed'); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'length', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'length', array('size' => 10, 'maxlength' => 10)); ?>
            <?php
            echo $form->dropDownList($model
                    , 'length_id'
                    , Distance::model()->findList()
                    , array('prompt' => 'Unit', 'class' => 'input-small')
            );
            ?>
            <?php echo $form->error($model, 'length'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'width', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'width', array('size' => 10, 'maxlength' => 10)); ?>
            <?php
            echo $form->dropDownList($model
                    , 'width_id'
                    , Distance::model()->findList()
                    , array('prompt' => 'Unit', 'class' => 'input-small')
            );
            ?>
            <?php echo $form->error($model, 'width'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'height', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'height', array('size' => 10, 'maxlength' => 10)); ?>
            <?php
            echo $form->dropDownList($model
                    , 'height_id'
                    , Distance::model()->findList()
                    , array('prompt' => 'Unit', 'class' => 'input-small')
            );
            ?>
            <?php echo $form->error($model, 'height'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'weight', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'weight', array('size' => 10, 'maxlength' => 10)); ?>
            <?php
            echo $form->dropDownList($model
                    , 'length_id'
                    , Weight::model()->findList()
                    , array('prompt' => 'Unit', 'class' => 'input-small')
            );
            ?>
            <?php echo $form->error($model, 'weight'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'wheelbase', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'wheelbase', array('size' => 10, 'maxlength' => 10)); ?>
            <?php
            echo $form->dropDownList($model
                    , 'wheelbase_id'
                    , Distance::model()->findList()
                    , array('prompt' => 'Unit', 'class' => 'input-small')
            );
            ?>
            <?php echo $form->error($model, 'wheelbase'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'spoorbreedte_voor', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'spoorbreedte_achter', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'production_number', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->checkBoxRow($model, 'published'); ?>
    <?php echo $form->textFieldRow($model, 'ordering'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->