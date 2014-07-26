<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Participant', 'url'=>array('index')),
	array('label'=>'Create Participant', 'url'=>array('create')),
	array('label'=>'Update Participant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Participant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Participant', 'url'=>array('admin')),
);
?>

<h1>View Participant #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array('label' => $model->getAttributeLabel('individual_id')
             ,'type'  => 'raw'
             ,'value' => CHtml::Link( CHtml::encode($model->individual->full_name)
                                    , array('individual/view','id'=>$model->individual_id)
                                    )
        ),
        array('label' => $model->getAttributeLabel('project_id')
             ,'type'  => 'raw'
             ,'value' => CHtml::Link( CHtml::encode($model->project->name)
                                    , array('project/view','id'=>$model->project_id)
                                    )
        ),
        array('label' => $model->getAttributeLabel('team_id')
             ,'type'  => 'raw'
             ,'value' => CHtml::Link( CHtml::encode($model->team->name)
                                    , array('team/view','id'=>$model->team_id)
                                    )
        ),
		'number',
		'initial_points',
		'raceclass_id',
		'checked_out',
		'checked_out_time',
		'created',
		'modified',
		'deleted',
		'deleted_date',
	),
)); ?>
