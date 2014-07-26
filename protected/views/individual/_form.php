<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'individual-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'first_name', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->textFieldRow($model, 'full_name', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldRow($model, 'alias', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldRow($model, 'nickname', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldRow($model, 'height', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'weight', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'gender', array('size' => 1, 'maxlength' => 1)); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'date_of_birth', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('application.extensions.jui.EDatePicker', array(
                'name' => 'date_of_birth',
                'attribute' => 'date_of_birth', // Model attribute filed which hold user input
                'model' => $model, // Model name
                'language' => 'en',
                'mode' => 'imagebutton',
                'theme' => 'redmond',
                //'value'=>date('d-m-Y'),
                'htmlOptions' => array('size' => 15),
                'fontSize' => '0.8em'
                    )
            );
            ?>

            <?php echo $form->error($model, 'date_of_birth'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'place_of_birth', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->dropdownListRow($model, 'country_of_birth', Countries::findList()); ?>
    <?php echo $form->dropdownListRow($model, 'nationality', Countries::findList()); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'date_of_death', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('application.extensions.jui.EDatePicker', array(
                'name' => 'date_of_death',
                'attribute' => 'date_of_death', // Model attribute filed which hold user input
                'model' => $model, // Model name
                'language' => 'en',
                'mode' => 'imagebutton',
                'theme' => 'redmond',
                //'value'=>date('d-m-Y'),
                'htmlOptions' => array('size' => 15),
                'fontSize' => '0.8em'
                    )
            );
            ?>
            <?php echo $form->error($model, 'date_of_death'); ?>
        </div>
    </div>

    <?php echo $form->textFieldRow($model, 'place_of_death', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->dropdownListRow($model, 'country_of_death', Countries::findList()); ?>
    <?php echo $form->dropdownListRow($model, 'user_id', User::model()->findList(), array('prompt' => '- Select an User -')); ?>

    <?php echo $form->textAreaRow($model, 'address', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'postcode', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->textFieldRow($model, 'city', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->textFieldRow($model, 'state', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->dropdownListRow($model, 'country', Countries::findList()); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'description', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
            $this->widget('application.extensions.fckeditor.FCKEditorWidget', array(
                'model' => $model,
                'attribute' => 'description',
                'height' => '600px',
                'width' => '80%',
                'fckeditor' => dirname(Yii::app()->basePath) . '/fckeditor/fckeditor.php',
                'fckBasePath' => Yii::app()->baseUrl . '/fckeditor/')
            );
            ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>
    </div>

    <?php echo $form->checkBoxRow($model, 'published'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
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