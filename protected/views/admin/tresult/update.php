<?php
$this->breadcrumbs = array(
    'Tresults' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);

$this->menu = array(
    array('label' => 'List Tresult', 'url' => array('index')),
    array('label' => 'Create Tresult', 'url' => array('create')),
    array('label' => 'View Tresult', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Delete Tresult', 'url' => array('delete', 'id' => $model->id)),
    array('label' => 'Manage Tresult', 'url' => array('admin')),
);
?>

<h1> Update Tresult #<?php echo $model->id; ?> </h1>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'type' => 'horizontal',
    'id' => 'tresult-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('class' => "well form-horizontal")
        )
);
echo $this->renderPartial('_form', array('model' => $model, 'form' => $form, 'trindividuals' => $model->trindividuals));
?>

<div class="form-group">
    <?php echo CHtml::submitButton(Yii::t('app', 'Update')); ?>
</div>

<?php $this->endWidget(); ?>

