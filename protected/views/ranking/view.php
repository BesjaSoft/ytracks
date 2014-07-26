<?php
$this->breadcrumbs=array(
    'Rankings'=>array('index'),
    $model->id,
);

$this->menu=array(
    array('label'=>'List Ranking', 'url'=>array('index')),
    array('label'=>'Create Ranking', 'url'=>array('create')),
    array('label'=>'Update Ranking', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Ranking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Ranking', 'url'=>array('admin')),
);
?>

<h1>View Ranking #<?php echo $model->id; ?></h1>

<?php

if ($model->project->hasDivisions()){
    $division = array
                ( 'label' => $model->getAttributeLabel('raceclass_id')
                ,'type'  => 'raw'
                ,'value' => CHtml::Link( CHtml::encode($model->raceclass->name)
                                       , array('raceclass/view','id'=>$model->raceclass_id)
                                        )
                );
}
if (is_array($division)){
    $this->widget('bootstrap.widgets.TbDetailView', array(
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
        'rank',
        'points',
        'checked_out',
        'checked_out_time',
        'created',
        'modified',
        array( 'label' => $model->getAttributeLabel('deleted')
        , 'type'  => 'raw'
        , 'value' => $model->getDeletedImage()
        ),
        'deleted_date',
    ),
));
}
else {
$this->widget('bootstrap.widgets.TbDetailView', array(
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
        'rank',
        'points',
        'checked_out',
        'checked_out_time',
        'created',
        'modified',
        array( 'label' => $model->getAttributeLabel('deleted')
        , 'type'  => 'raw'
        , 'value' => $model->getDeletedImage()
        ),
        'deleted_date',
    ),
));
} ?>
