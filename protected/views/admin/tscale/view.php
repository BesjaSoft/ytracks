<?php
$this->breadcrumbs=array(
	'Tscales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tscale', 'url'=>array('index')),
	array('label'=>'Create Tscale', 'url'=>array('create')),
	array('label'=>'Update Tscale', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tscale', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Export Tscale', 'url'=>array('export', 'id'=>$model->id)),
	array('label'=>'Manage Tscale', 'url'=>array('admin')),
);
?>

<h1>View Tscale #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'merk',
		'referentie',
		'car',
		'omschrijving',
		'categorie',
        array('name'=>'type_id'    , 'type' => 'raw', 'value' => CHtml::link(CHtml::encode($model->type->make->name),array('make/view', 'id' => $model->type->make_id)).' '.CHtml::link(CHtml::encode($model->type->name), array('type/view', 'id' => $model->type_id))),
        array('name'=>'category_id', 'type' => 'raw', 'value' => CHtml::link(CHtml::encode($model->modelcategory->description), array('admin/unit/view', 'id' => $model->category_id))),
		'deleted',
	),
)); ?>


