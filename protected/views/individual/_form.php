<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'individual-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'first_name', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->textFieldGroup($model, 'full_name', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldGroup($model, 'alias', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldGroup($model, 'nickname', array('size' => 60, 'maxlength' => 100)); ?>
    <?php /*echo $form->textFieldGroup($model, 'height', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'weight', array('size' => 10, 'maxlength' => 10)); */?>
    <?php echo $form->textFieldGroup($model, 'gender', array('size' => 1, 'maxlength' => 1)); ?>

    <?php
    $options = array('format' => 'dd/mm/yyyy');
    echo $form->datePickerGroup($model, 'date_of_birth', $options);
    ?>

    <?php echo $form->textFieldGroup($model, 'place_of_birth', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->dropDownListGroup($model, 'country_of_birth', array('widgetOptions' => array('data' => Country::model()->findList(), 'prompt' => '-- Country --'))); ?>
    <?php echo $form->dropDownListGroup($model, 'nationality', array('widgetOptions' => array('data' => Country::model()->findList(), 'prompt' => '-- Country --'))); ?>

    <?php echo $form->datepickerGroup($model, 'date_of_death'); ?>

    <?php echo $form->textFieldGroup($model, 'place_of_death', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->dropDownListGroup($model, 'country_of_death', array('widgetOptions' => array('data' => Country::model()->findList(), 'prompt' => '-- Country --'))); ?>
    <?php /* echo $form->dropDownListGroup($model, 'user_id', User::model()->findList(), array('prompt' => '- Select an User -')); ?>

    <?php echo $form->textAreaGroup($model, 'address', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'postcode', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldGroup($model, 'city', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldGroup($model, 'state', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->dropDownListGroup($model, 'country', array('widgetOptions' => array('data' => Country::model()->findList(), 'prompt' => '-- Country --'))); */?>
    <?php echo $form->ckeditorGroup($model, 'description'); ?>
    <?php echo $form->checkBoxGroup($model, 'published'); ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array('buttonType' => 'submit', 'label' => $model->isNewRecord ? 'Create' : 'Save', 'context' => 'primary')
            );
            ?>
        </div>
    </div>

    <?php /*

      <div class="row">
      <?php echo $form->labelEx($model,'checked_out'); ?>
      <?php echo $form->textField($model,'checked_out'); ?>
      <?php echo $form->error($model,'checked_out'); ?>
      </div>

      <div class="row">
      <?php echo $form->labelEx($model,'checked_out_time'); ?>
      <?php echo $form->textField($model,'checked_out_time'); ?>
      <?php echo $form->error($model,'checked_out_time'); ?>
      </div>

      <div class="row">
      <?php echo $form->labelEx($model,'created'); ?>
      <?php echo $form->textField($model,'created'); ?>
      <?php echo $form->error($model,'created'); ?>
      </div>

      <div class="row">
      <?php echo $form->labelEx($model,'modified'); ?>
      <?php echo $form->textField($model,'modified'); ?>
      <?php echo $form->error($model,'modified'); ?>
      </div>

      <div class="row">
      <?php echo $form->labelEx($model,'deleted_date'); ?>
      <?php echo $form->textField($model,'deleted_date'); ?>
      <?php echo $form->error($model,'deleted_date'); ?>
      </div>
     */ ?>

<?php $this->endWidget(); ?>

</div><!-- form -->