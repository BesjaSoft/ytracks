<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'club_id',
        'name',
        'alias',
        'short_name',
        'published',
        'acronym',
        $this->ShowConstructorDetailView($model),
        'picture',
        'picture_small',
        'country_code',
        'description',
        'admin_id',
        'ordering',
        'checked_out',
        'checked_out_time',
        'created',
        'modified',
        'deleted',
        'deleted_date',
    ),
));
?>
