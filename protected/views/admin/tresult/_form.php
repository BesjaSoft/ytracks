<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'content_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <b><?php echo CHtml::encode($model->content->title); ?></b>
    </div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'round', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, 'round', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->textField($model, 'rounddate', array('size' => 20, 'maxlength' => 12)); ?>
        <?php echo $form->error($model, 'round'); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->hiddenField($model, 'subround_id'); ?>
    <?php echo $form->labelEx($model, 'subround_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array('id' => 'subround_id',
            'name' => 'subround_id',
            'value' => isset($model->subround_id) ? ($model->subround->round->name . ' ' . $model->subround->start_date . '/' . $model->subround->subroundtype->name) : $model->subround_id,
            'source' => $this->createUrl('subround/autoComplete'),
            'options' => array('showAnim' => 'fold',
                'minLength' => 3,
                'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Tresult_subround_id").val($selectedObject.id);}'
            ),
            'htmlOptions' => array('style' => 'width:300px')
                )
        );
        ?>
        <?php echo $form->error($model, 'subround_id'); ?>
    </div>
</div>

<?php echo $form->textFieldGroup($model, 'row'); ?>
<?php echo $form->textFieldGroup($model, 'num', array('size' => 60, 'maxlength' => 255)); ?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'subround_id', array('class' => 'control-label')); ?>
    <div class="controls row">
        <div class="span3">
            <?php echo $form->textArea($model, 'individuals', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'individuals'); ?>
        </div>
        <div class="span6">
            <?php
            $gridDataProvider = new CArrayDataProvider($trindividuals);
            $this->widget('booster.widgets.TbGridView', array(
                'type' => 'striped bordered condensed',
                'dataProvider' => $gridDataProvider,
                'template' => "{items}",
                'columns' => array(
                    array('name' => 'id', 'header' => '#'),
                    array('name' => 'firstName', 'header' => 'Name', 'value' => '$data->individual->full_name'),
                    array(
                        'class' => 'booster.widgets.TbButtonColumn',
                        'htmlOptions' => array('style' => 'width: 50px'),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
<?php echo $form->textFieldGroup($model, 'laps', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'performance', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'classification', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'raceclass', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'grid', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'laptime', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'Livery', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->textFieldGroup($model, 'Field4Question', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'Field4Or', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'Field4Evo', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->textFieldGroup($model, 'Field4_2', array('size' => 10, 'maxlength' => 10)); ?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'tvehicle', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, 'tvehicle', array('size' => 40, 'maxlength' => 255)); ?>
        <?php echo $form->textField($model, 'tchassis', array('size' => 20, 'maxlength' => 50)); ?>
        <?php echo $form->textField($model, 'tlicenseplate', array('size' => 20, 'maxlength' => 50)); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'tvehicle', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        echo $form->dropDownList($model, 'make_id', Make::model()->findList()
                , array('prompt' => '- Select a Make -'
            , 'ajax' => array('type' => 'POST' //request type
                , 'url' => Yii::app()->baseUrl . '/index.php?r=admin/tresult/gettypes' //url to call
                , 'update' => '#Tresult_type_id' //selector to update
            )
                )
        );
        ?>
        <?php echo $form->error($model, 'make_id'); ?>

        <?php
        echo $form->dropDownList($model
                , 'type_id'
                , Type::model()->findList('make_id = :make', array(':make' => $model->make_id))
                , array('prompt' => '- Select a Type -'
            , 'ajax' => array('type' => 'POST' //request type
                , 'url' => Yii::app()->baseUrl . '/index.php?r=admin/tresult/getvehicles' //url to call
                , 'update' => '#Tresult_vehicle_id' //selector to update
            )
                )
        );
        ?>
        <?php echo $form->error($model, 'type_id'); ?>
        <?php
        echo $form->dropDownList($model, 'vehicle_id', Vehicle::model()->findList('type_id = :type', array(':type' => $model->type_id)), array('prompt' => '- Select a Vehicle -')
        );
        ?>
        <?php echo $form->error($model, 'vehicle_id'); ?>
    </div>
</div>
        <?php echo $form->dropDownListGroup($model, 'engine_id', Engine::model()->findList(), array('prompt' => '- Select an Engine -')); ?>
<?php echo $form->textFieldGroup($model, 'tteam', array('size' => 60, 'maxlength' => 255)); ?>

<div class="control-group">
<?php echo $form->hiddenField($model, 'team_id'); ?>
<?php echo $form->labelEx($model, 'team_id', array('class' => 'control-label')); ?>
    <div class="controls">
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete'
            , array('id' => 'team_id'
        , 'name' => 'team_id'
        , 'value' => isset($model->team_id) ? $model->team->name : $model->team_id
        , 'source' => $this->createUrl('team/autoComplete')
        , 'options' => array('showAnim' => 'fold'
            , 'minLength' => 3
            , 'select' => 'js:function(event, ui){ var $selectedObject = ui.item; $("#Tresult_team_id").val($selectedObject.id);}'
        )
        , 'htmlOptions' => array('style' => 'width:300px')
    ));
    ?>
        <?php echo $form->error($model, 'team_id'); ?>
    </div>
</div>

<?php echo $form->checkBoxGroup($model, 'deleted'); ?>
<?php echo $form->textFieldGroup($model, 'error', array('size' => 10, 'maxlength' => 1)); ?>
