<?php
$this->breadcrumbs=array(
	'Engines'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Engine', 'url'=>array('index')),
	array('label'=>'Create Engine', 'url'=>array('create')),
	array('label'=>'Update Engine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Engine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Engine', 'url'=>array('admin')),
);
?>

<h1>View Engine #<?php echo $model->id; ?></h1>

<?php

$attributes[] = 'id';
$attributes[] = array('name' => 'make_id','type'=>'raw','value'=>CHtml::Link( CHtml::encode($model->make->name), array('make/view','id'=>$model->make_id)));
$attributes[] = 'name';
$attributes[] = 'alias';
$attributes[] = 'description';
$attributes[] = 'code';
//
if (!empty($model->parent_id)){
    $attributes[]='parent_id';
}
$attributes[]= 'tuner_id';
$attributes[]= array('name' => 'enginetype_id','type'=>'raw','value'=>CHtml::Link( CHtml::encode($model->enginetype->name), array('enginetype/view','id'=>$model->enginetype_id)));
$attributes[]= 'compression';
$attributes[]= 'cams';
$attributes[]= 'valves_cylinder';
$attributes[]= 'bore';
$attributes[]= 'stroke';
$attributes[]= array('name' => 'capacity','type'=>'raw','value'=> CHtml::encode($model->capacity.' '.$model->capacityUnit->code));
$attributes[]= array('name' => 'power'   ,'type'=>'raw','value'=> CHtml::encode($model->power   .' '.$model->powerUnit->code.' at '.$model->power_revs.' revs'));
$attributes[]= array('name' => 'torque'  ,'type'=>'raw','value'=> CHtml::encode($model->torque  .' '.$model->torqueUnit->code.' at '.$model->torque_revs.' revs'));
$attributes[]= 'induction';
$attributes[]= 'ignition_id';
$attributes[]= 'fuelsystem_id';
$attributes[]= array('name' => 'published','type'=>'raw','value'=>$model->getPublishedImage());
$attributes[]= 'ordering';
$attributes[]= 'checked_out';
$attributes[]= 'checked_out_time';
$attributes[]= 'created';
$attributes[]= 'modified';
$attributes[]= array('name'=> 'deleted','type'=>'raw', 'value'=> $model->getDeletedImage());
$attributes[]= 'deleted_date';

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=> $attributes
)); ?>
