<?php
$this->breadcrumbs = array(
    'Projects',
);

$this->menu = array(
    array('label' => 'Create Project', 'url' => array('create')),
    array('label' => 'Manage Project', 'url' => array('admin')),
);
?>

<h1>Projects</h1>

<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'type' => 'search',
        'htmlOptions' => array('class' => 'well'),
            ));
    ?>

    <?php echo $form->textFieldRow($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'input-medium', 'prepend' => '<i class="icon-search"></i>')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Go')); ?>    


    <?php $this->endWidget(); ?>

</div><!-- search-form -->

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
