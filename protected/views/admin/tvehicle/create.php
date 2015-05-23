<?php
$this->breadcrumbs = array(
    'Tvehicles' => array(Yii::t('app', 'index')),
    Yii::t('app', 'Create'),
);

$this->menu = array(
    array('label' => 'List Tvehicle', 'url' => array('index')),
    array('label' => 'Manage Tvehicle', 'url' => array('admin')),
);
?>

<h1> Create Tvehicle </h1>
<div class="form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
        'id' => 'tvehicle-form',
        'enableAjaxValidation' => true,
            ));
    echo $this->renderPartial('_form', array(
        'model' => $model,
        'form' => $form
    ));
    ?>

    <div class="row buttons">
    <?php echo CHtml::submitButton(Yii::t('app', 'Create')); ?>
    </div>

<?php $this->endWidget(); ?>

</div>
