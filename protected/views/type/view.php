<?php
$this->breadcrumbs=array(
	'Types'=>array('index'),
	$model->make->name.' '.$model->name,
);

$this->menu=array(
	array('label'=>'List Type'  , 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
	array('label'=>'Update Type', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);
?>

<h1>View Type <?php echo $model->fullname; ?></h1>

<?php

$tabs = array();
$tabs['Details']     = $this->renderPartial( '_detail'                 , array( 'model' => $model ) , true , false );
$tabs['Vehicles']    = $this->renderPartial( '/vehicle/_vehicles'      , array( 'model' => $model ) , true , false );
$tabs['Results']     = $this->renderPartial( '/result/_results'        , array( 'model' => $model ) , true , false );
$tabs['Scalemodels'] = $this->renderPartial( '/scalemodel/_scalemodels', array( 'model' => $model ) , true , false );
$tabs['Pictures']    = $this->renderPartial( '/album/_view'            , array( 'model' => $model ) , true , false );

$this->widget( 'zii.widgets.jui.CJuiTabs'
             , array( 'tabs' => $tabs
                    , 'options' => array(
                    //'collapsible' => false,
                    //'selected' => $this->selected_tab,
                    //'height' => '100px',
                    'id' => 'type-detail')
                    )
             );
?>
