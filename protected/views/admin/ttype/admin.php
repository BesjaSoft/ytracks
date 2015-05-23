<?php
$this->breadcrumbs = array(
    'Ttypes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Ttype', 'url' => array('index')),
    array('label' => 'Create Ttype', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ttype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ttypes</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'ttype-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        $this->showContentGrid(),
        $this->showMakeGrid(),
        $this->showTypeGrid(),
        'engine_id',
        'name',
        /*
          'tuner',
          'country',
          'year',
          'engine',
          'engine_type',
          'cams',
          'valves_cyl',
          'compression',
          'bore',
          'stroke',
          'capacity_cc',
          'power_at_revs',
          'torque',
          'induction',
          'ignition',
          'fuel_system',
          'chassis_type',
          'body_type',
          'designer',
          'front_suspension',
          'rear_suspension',
          'shock_absorbers',
          'engine_position',
          'wheelbase_mm',
          'front_track_mm',
          'rear_track_mm',
          'weight_kg',
          'drive',
          'number_of_gears',
          'gearbox',
          'fuel_tank_size_litres',
          'brakes',
          'front_brake_type',
          'rear_brake_type',
          'front_rims',
          'rear_rims',
          'tyres',
          'front_tyres',
          'rear_tyres',
          'maximum_speed_kph',
          'error',
          'created',
          'modified',
          'deleted',
          'deleted_date',
         */
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
