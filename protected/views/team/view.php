<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Team', 'url'=>array('index')),
	array('label'=>'Create Team', 'url'=>array('create')),
	array('label'=>'Update Team', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Team', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Team', 'url'=>array('admin')),
);
?>

<h1>View Team #<?php echo $model->id; ?></h1>

<?php
$tabs = array();
$tabs['Details']  = $this->renderPartial( '_detail'         , array( 'model' => $model ) , true , false );
$tabs['Results']  = $this->renderPartial( '/result/_results', array( 'model' => $model ) , true , false);

$this->widget('zii.widgets.jui.CJuiTabs', array(
                'tabs' => $tabs,
                'options' => array(
                    'collapsible' => false,
                    'id' => 'team-detail'
                ),
));
?>