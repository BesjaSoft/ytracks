<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'code',
        array( 'label' => $model->getAttributeLabel('country_code')
             , 'type'  => 'raw'
             , 'value' => $model->getFlag($model->country_code)
             ),
		array
		( 'label' =>$model->getAttributeLabel('description')
		, 'type'  => 'html'
		, 'value' => $model->description
		),
		'ordering',
		'checked_out',
		'checked_out_time',
        array( 'label' => $model->getAttributeLabel('published')
             , 'type'  => 'raw'
             , 'value' => $model->getPublishedImage()
             ),
		'created',
		'modified',
        array( 'label' => 'Active'
             , 'type'  => 'raw'
             , 'value' => $model->getDeletedImage()
             ),
		'deleted_date',
	),
)); ?>
