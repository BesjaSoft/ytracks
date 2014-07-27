<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		array( 'label' => $model->getAttributeLabel('competition_id')
		     , 'value' => $model->competition->name
		     ),
		array( 'label' => $model->getAttributeLabel('season_id')
		     , 'value' => $model->season->name
		     ),
		array( 'label'=> 'Admin'
		     , 'value'=> isset($model->administrator) ? $model->administrator->name : 'unknown'
		     ),
		'type',
		'params',
		'ordering',
		'checked_out',
		'checked_out_time',
        //array( 'label' => 'Published'
        //     , 'type'  => 'raw'
        //     , 'value' => $model->getPublishedImage()
        //     ),
		'created',
		'modified',
        //array( 'label' => 'Active'
        //     , 'type'  => 'raw'
        //     , 'value' => $model->getDeletedImage()
        //     ),
		'deleted_date',
	),
)); ?>
