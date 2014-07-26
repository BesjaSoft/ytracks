<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('individual_id')); ?>:</b>
	<?php echo CHtml::encode($data->individual_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('internal_reference')); ?>:</b>
	<?php echo CHtml::encode($data->internal_reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source_id')); ?>:</b>
	<?php echo CHtml::encode($data->source_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source_reference')); ?>:</b>
	<?php echo CHtml::encode($data->source_reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	*/ ?>

</div>