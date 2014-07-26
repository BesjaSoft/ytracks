<?php
$this->breadcrumbs=array(
	'Subrounds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Subround', 'url'=>array('index')),
	array('label'=>'Create Subround', 'url'=>array('create')),
	array('label'=>'Update Subround', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subround', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subround', 'url'=>array('admin')),
);
?>

<h1>View Subround #<?php echo $model->id; ?></h1>

<?php
$tabs = array();
$tabs['Details']  = $this->renderPartial( '_detail'         , array( 'model' => $model ) , true , false );
$tabs['Results']  = $this->renderPartial( '/result/_results', array( 'model' => $model ) , true , false);

$this->widget('zii.widgets.jui.CJuiTabs', array(
                'tabs' => $tabs,
                'options' => array(
                    'collapsible' => false,
                   // 'selected' => $this->selected_tab,
                    'id' => 'subround-detail'
                ),
));
?>
