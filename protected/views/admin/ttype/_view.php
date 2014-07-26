<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_id')); ?>:</b>
	<?php echo CHtml::encode($data->content_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('make_id')); ?>:</b>
	<?php echo CHtml::encode($data->make_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_id')); ?>:</b>
	<?php echo CHtml::encode($data->engine_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tuner')); ?>:</b>
	<?php echo CHtml::encode($data->tuner); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine')); ?>:</b>
	<?php echo CHtml::encode($data->engine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_type')); ?>:</b>
	<?php echo CHtml::encode($data->engine_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cams')); ?>:</b>
	<?php echo CHtml::encode($data->cams); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valves_cyl')); ?>:</b>
	<?php echo CHtml::encode($data->valves_cyl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compression')); ?>:</b>
	<?php echo CHtml::encode($data->compression); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bore')); ?>:</b>
	<?php echo CHtml::encode($data->bore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stroke')); ?>:</b>
	<?php echo CHtml::encode($data->stroke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacity_cc')); ?>:</b>
	<?php echo CHtml::encode($data->capacity_cc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power_at_revs')); ?>:</b>
	<?php echo CHtml::encode($data->power_at_revs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('torque')); ?>:</b>
	<?php echo CHtml::encode($data->torque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('induction')); ?>:</b>
	<?php echo CHtml::encode($data->induction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ignition')); ?>:</b>
	<?php echo CHtml::encode($data->ignition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_system')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_system); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chassis_type')); ?>:</b>
	<?php echo CHtml::encode($data->chassis_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body_type')); ?>:</b>
	<?php echo CHtml::encode($data->body_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('designer')); ?>:</b>
	<?php echo CHtml::encode($data->designer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('front_suspension')); ?>:</b>
	<?php echo CHtml::encode($data->front_suspension); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rear_suspension')); ?>:</b>
	<?php echo CHtml::encode($data->rear_suspension); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shock_absorbers')); ?>:</b>
	<?php echo CHtml::encode($data->shock_absorbers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_position')); ?>:</b>
	<?php echo CHtml::encode($data->engine_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wheelbase_mm')); ?>:</b>
	<?php echo CHtml::encode($data->wheelbase_mm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('front_track_mm')); ?>:</b>
	<?php echo CHtml::encode($data->front_track_mm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rear_track_mm')); ?>:</b>
	<?php echo CHtml::encode($data->rear_track_mm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight_kg')); ?>:</b>
	<?php echo CHtml::encode($data->weight_kg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('drive')); ?>:</b>
	<?php echo CHtml::encode($data->drive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_of_gears')); ?>:</b>
	<?php echo CHtml::encode($data->number_of_gears); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gearbox')); ?>:</b>
	<?php echo CHtml::encode($data->gearbox); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_tank_size_litres')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_tank_size_litres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brakes')); ?>:</b>
	<?php echo CHtml::encode($data->brakes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('front_brake_type')); ?>:</b>
	<?php echo CHtml::encode($data->front_brake_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rear_brake_type')); ?>:</b>
	<?php echo CHtml::encode($data->rear_brake_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('front_rims')); ?>:</b>
	<?php echo CHtml::encode($data->front_rims); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rear_rims')); ?>:</b>
	<?php echo CHtml::encode($data->rear_rims); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tyres')); ?>:</b>
	<?php echo CHtml::encode($data->tyres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('front_tyres')); ?>:</b>
	<?php echo CHtml::encode($data->front_tyres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rear_tyres')); ?>:</b>
	<?php echo CHtml::encode($data->rear_tyres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maximum_speed_kph')); ?>:</b>
	<?php echo CHtml::encode($data->maximum_speed_kph); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('error')); ?>:</b>
	<?php echo CHtml::encode($data->error); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
	<?php echo CHtml::encode($data->deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted_date')); ?>:</b>
	<?php echo CHtml::encode($data->deleted_date); ?>
	<br />

	*/ ?>

</div>