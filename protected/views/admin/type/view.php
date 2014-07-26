<?php
$this->breadcrumbs=array(
	'Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
	array('label'=>'Update Type', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);
?>

<h1>View Type #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array('label' => $model->getAttributeLabel('make_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->make->name)
			                            , array('make/view','id'=>$model->make_id)
			                            )
			)
,		'name',
		'alias',
		'description',
		'chassiscode',
		array('label' => $model->getAttributeLabel('cartype_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->cartype->name)
			                            , array('cartype/view','id'=>$model->cartype_id)
			                            )
			)
,		array('label' => $model->getAttributeLabel('constructor_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->constructor->name)
			                            , array('constructor/view','id'=>$model->constructor_id)
			                            )
			)
,		array('label' => $model->getAttributeLabel('bodywork_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->bodywork->name)
			                            , array('bodywork/view','id'=>$model->bodywork_id)
			                            )
			)
,		'from',
		'untill',
		array('label' => $model->getAttributeLabel('motortype_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->motortype->name)
			                            , array('motortype/view','id'=>$model->motortype_id)
			                            )
			)
,		array('label' => $model->getAttributeLabel('motorplace_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->motorplace->name)
			                            , array('motorplace/view','id'=>$model->motorplace_id)
			                            )
			)
,		array('label' => $model->getAttributeLabel('propulsion_id')
			     ,'type'  => 'raw'
			     ,'value' => CHtml::Link( CHtml::encode($model->propulsion->name)
			                            , array('propulsion/view','id'=>$model->propulsion_id)
			                            )
			)
,		'topspeed',
		'length',
		'width',
		'height',
		'weight',
		'wheelbase',
		'spoorbreedte_voor',
		'spoorbreedte_achter',
		'production_number',
		'registered',
		'published',
		'ordering',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
