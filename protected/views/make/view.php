<?php
$this->breadcrumbs=array('Makes'=>array('index'),$model->name,);

$this->menu=array(
	array('label' => 'List Make'  , 'url'=>array('index')),
	array('label' => 'Create Make', 'url'=>array('create')),
	array('label' => 'Update Make', 'url'=>array('update', 'id'=>$model->id)),
	array('label' => 'Delete Make', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label' => 'Manage Make', 'url'=>array('admin')),
);
?>

<h1>View Make <?php echo $model->name; ?></h1>

<?php
// build the tabs for the view
$tabs  = array();
$tabs['Details']     = $this->renderPartial('_detail', array( 'model' => $model ) , true , false );
if (empty($searchType)){
    $tabs['Types']       = $this->renderPartial('/type/_types', array('model' => $model) , true , false );
} else {
    $tabs['Types']       = $this->renderPartial('/type/_types', array('model' => $model, 'search'=>$searchType ) , true , false );
}
$tabs['Engines']     = $this->renderPartial('/engine/_engines', array('model' => $model) , true , false);
$tabs['Results']     = $this->renderPartial('/result/_results', array('model' => $model) , true , false);
$tabs['Scalemodels'] = $this->renderPartial('/scalemodel/_scalemodels', array( 'model' => $model) , true , false);
$tabs['Pictures']    = $this->renderPartial('/album/_view', array('model' => $model) , true , false );

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
