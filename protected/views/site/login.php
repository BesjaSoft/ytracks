<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => true,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well')
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->textFieldGroup($model, 'username'); ?>
    <?php echo $form->passwordFieldGroup($model, 'password'); ?>
    <?php echo $form->checkBoxGroup($model, 'rememberMe'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
