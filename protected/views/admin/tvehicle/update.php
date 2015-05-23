<?php
$this->breadcrumbs = array(
    'Tvehicles' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);

$this->menu = array(
    array('label' => 'List Tvehicle', 'url' => array('index')),
    array('label' => 'Create Tvehicle', 'url' => array('create')),
    array('label' => 'View Tvehicle', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Delete Tvehicle', 'url' => array('delete', 'id' => $model->id)),
    array('label' => 'Manage Tvehicle', 'url' => array('admin')),
);
?>

<h1> Update Tvehicle #<?php echo $model->id; ?> </h1>
<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
        'id' => 'tvehicle-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('class' => 'well')
            ));
    echo $this->renderPartial('_form', array(
        'model' => $model,
        'form' => $form
    ));
    ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton(Yii::t('app', 'Update')); ?>
        <?php echo CHtml::submitButton(Yii::t('app', 'Reset')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
