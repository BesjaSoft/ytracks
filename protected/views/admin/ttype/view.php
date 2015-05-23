<?php
$this->breadcrumbs = array(
    'Ttypes' => array('index'),
    $model->name,
);

$this->menu = $this->BuildActionMenu($model);
?>

<h1>View Ttype #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        $this->ShowContentDetail($model),
        $this->ShowIndividualDetailView($model),
        'type_id',
        'engine_id',
        'name',
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
    ),
));
?>
