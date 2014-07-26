<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => 'striped condensed',
    'data' => $model,
    'attributes' => array(
        'id',
        'created',
        'modified',
        'deleted',
        'deleted_date',
    ),
));
?>

