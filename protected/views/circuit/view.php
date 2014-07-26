<?php
$this->breadcrumbs=array(
	'Circuits'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Circuit', 'url'=>array('index')),
	array('label'=>'Create Circuit', 'url'=>array('create')),
	array('label'=>'Update Circuit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Circuit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Circuit', 'url'=>array('admin')),
);
?>

<h1>View Circuit #<?php echo $model->id; ?></h1>

<?php
// build the tabs for the view
$tabs  = array();
$tabs['Details']  = $this->renderPartial( '_detail'       , array( 'model' => $model ) , true , false );
$tabs['Rounds']   = $this->renderPartial( '/round/_rounds', array( 'model' => $model ) , true, false);
$tabs['Pictures'] = $this->renderPartial( '/album/_view'  , array( 'model' => $model ) , true , false );

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
