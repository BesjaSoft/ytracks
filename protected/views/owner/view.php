<?php
$this->breadcrumbs=array(
	'Owners'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Owner', 'url'=>array('index')),
	array('label'=>'Create Owner', 'url'=>array('create')),
	array('label'=>'Update Owner', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Owner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Owner', 'url'=>array('admin')),
);
?>

<h1>View Owner #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array('label' => $model->getAttributeLabel('vehicle_id')
             ,'type'  => 'raw'
             ,'value' => CHtml::Link( CHtml::encode($model->vehicle->type->make->name)
                                    , array('make/view','id'=>$model->vehicle->type->make_id)
                                    )
                        .' '
                        .CHtml::Link( CHtml::encode($model->vehicle->type->name)
                                    , array('type/view','id'=>$model->vehicle->type_id)
                                    )
                        .' '
                        .CHtml::Link( CHtml::encode($model->vehicle->chassisnumber)
                                    , array('vehicle/view','id'=>$model->vehicle_id)
                                    )
        ),
        array('label' => $model->getAttributeLabel('individual_id')
             ,'type'  => 'raw'
             ,'value' => CHtml::Link( CHtml::encode($model->individual->full_name)
                                    , array('individual/view','id'=>$model->individual_id)
                                    )
        ),
		'team_id',
		'from',
		'untill',
		'description',
		'current',
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
