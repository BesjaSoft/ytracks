<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'club_id',
		'name',
		'alias',
		'short_name',
		'published',
		'acronym',
		array
		( 'label' => $model->getAttributeLabel('constructor_id')
		, 'type'  => 'raw'
		, 'value' => CHtml::Link( CHtml::encode($model->constructor->name)
                                , array('make/view','id'=>$model->constructor_id)
                                )
		)
		,
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
)); ?>
