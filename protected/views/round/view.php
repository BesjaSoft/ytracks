<?php
$this->breadcrumbs=array(
	'Rounds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Round'  , 'url'=>array('index')),
	array('label'=>'Create Round', 'url'=>array('create')),
	array('label'=>'Update Round', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Round', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Round', 'url'=>array('admin')),
);
?>

<h1>View Round #<?php echo $model->id; ?></h1>

<?php
// build the tabs for the view
$tabs  = array();
$tabs['Details']   = $this->renderPartial( '_detail'             , array( 'model' => $model ) , true , false );
$tabs['Subrounds'] = $this->renderPartial( '/subround/_subrounds', array( 'model' => $model ) , true, false);
$tabs['Pictures']  = $this->renderPartial( '/album/_view'        , array( 'model' => $model ) , true , false );

$this->widget('zii.widgets.jui.CJuiTabs', array(
                'tabs' => $tabs,
                /*'options' => array(
                    'collapsible' => false,
                    'selected' => $tab,
                    'height' => '100px',
                    'id' => 'garage-detail'
                ),*/
));

?>
