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
    array('label' => 'Manage Tvehicle', 'url' => array('admin')),
);
?>

<h1> Update Tvehicle #<?php echo $model->id; ?> </h1>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tvehicle-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('class' => 'well')
        ));
echo $this->renderPartial('_form', array(
    'model' => $model,
    'form' => $form
));
?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Update')); ?>
</div>

<?php $this->endWidget(); ?>


