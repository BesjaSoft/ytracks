<?php
$this->breadcrumbs = array(
    'Tscales' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);

$this->menu = array(
    array('label' => 'List Tscale', 'url' => array('index')),
    array('label' => 'Create Tscale', 'url' => array('create')),
    array('label' => 'View Tscale', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Export Tscale', 'url' => array('export', 'id' => $model->id)),
    array('label' => 'Manage Tscale', 'url' => array('admin')),
);
?>

<h1> Update Tscale #<?php echo $model->id; ?> </h1>
<div class="wide form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'type' => 'horizontal',
        'id' => 'tscale-form',
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
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
