<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'htmlOptions' => array('class' => "well form-horizontal"),
        'id' => 'project-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model, 'name', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->dropdownlistRow($model, 'competition_id', Competition::model()->findList()); ?>
    <?php echo $form->dropdownlistRow($model, 'season_id', Season::model()->findList()); ?>
    <?php echo $form->dropdownlistRow($model, 'admin_id', User::model()->findList()); ?>
    <?php echo $form->textFieldGroup($model, 'type'); ?>
    <?php echo $form->textAreaGroup($model, 'params', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'ordering'); ?>
    <?php echo $form->checkboxRow($model, 'published'); ?>
    <?php echo $form->error($model, 'published'); ?>

    <div class="form-actions">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->