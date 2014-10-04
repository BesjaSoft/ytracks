<?php
$this->breadcrumbs = $model->getBreadcrumbs();

$this->menu = array(
    array('label' => 'List Subround', 'url' => array('index')),
    array('label' => 'Create Subround', 'url' => array('create')),
    array('label' => 'View Subround', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Subround', 'url' => array('admin')),
);
?>

<h1>Update Subround <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>