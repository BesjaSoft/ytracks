<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Competition', 'url'=>array('index')),
	array('label'=>'Create Competition', 'url'=>array('create')),
	array('label'=>'Update Competition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Competition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Competition', 'url'=>array('admin')),
);
?>

<h1>View Competition #<?php echo $model->id; ?></h1>

<?php
// build the tabs for the view
$tabs  = array();
$tabs['Details']  = $this->renderPartial( '_detail'           , array( 'model' => $model ) , true , false );
$tabs['Projects'] = $this->renderPartial( '/project/_projects', array( 'model' => $model ) , true , false);
$tabs['Pictures'] = $this->renderPartial( '/album/_view'      , array( 'model' => $model ) , true , false );

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
