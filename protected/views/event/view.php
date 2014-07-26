<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>

<h1>View Event #<?php echo $model->id; ?></h1>

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
