<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array('label' => $model->getAttributeLabel('round_id')
		     ,'type'  => 'raw'
		     ,'value' => CHtml::Link( CHtml::encode($model->round->name)
		                            , array('round/view','id'=>$model->round_id)
		                            )
		),
		array('label' => $model->getAttributeLabel('subroundtype_id')
		     ,'type'  => 'raw'
		     ,'value' => CHtml::Link( CHtml::encode($model->subroundtype->name)
		                            , array('subroundtype/view','id'=>$model->subroundtype_id)
		                            )
		),
		'name',
		'ordering',
		'start_date',
		'end_date',
		'description',
		'comment',
		'factor',
		array( 'label' => $model->getAttributeLabel('published')
		, 'type'  => 'raw'
		, 'value' => $model->getPublishedImage()
		),
	),
)); ?>
