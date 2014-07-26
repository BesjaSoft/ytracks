<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('make_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->make->name),array('make/view','id'=>$data->make_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />
    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('tuner_id')); ?>:</b>
	<?php echo CHtml::encode($data->tuner_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enginetype_id')); ?>:</b>
	<?php echo CHtml::encode($data->enginetype_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compression')); ?>:</b>
	<?php echo CHtml::encode($data->compression); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cams')); ?>:</b>
	<?php echo CHtml::encode($data->cams); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valves_cylinder')); ?>:</b>
	<?php echo CHtml::encode($data->valves_cylinder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bore')); ?>:</b>
	<?php echo CHtml::encode($data->bore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stroke')); ?>:</b>
	<?php echo CHtml::encode($data->stroke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacity')); ?>:</b>
	<?php echo CHtml::encode($data->capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacity_id')); ?>:</b>
	<?php echo CHtml::encode($data->capacity_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power')); ?>:</b>
	<?php echo CHtml::encode($data->power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power_id')); ?>:</b>
	<?php echo CHtml::encode($data->power_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power_revs')); ?>:</b>
	<?php echo CHtml::encode($data->power_revs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('torque')); ?>:</b>
	<?php echo CHtml::encode($data->torque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('torque_id')); ?>:</b>
	<?php echo CHtml::encode($data->torque_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('torque_rev')); ?>:</b>
	<?php echo CHtml::encode($data->torque_rev); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('induction')); ?>:</b>
	<?php echo CHtml::encode($data->induction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ignition_id')); ?>:</b>
	<?php echo CHtml::encode($data->ignition_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuelsystem_id')); ?>:</b>
	<?php echo CHtml::encode($data->fuelsystem_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordering')); ?>:</b>
	<?php echo CHtml::encode($data->ordering); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checked_out')); ?>:</b>
	<?php echo CHtml::encode($data->checked_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checked_out_time')); ?>:</b>
	<?php echo CHtml::encode($data->checked_out_time); ?>
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