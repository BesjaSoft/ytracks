<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tvehicle')); ?>:</b>

	<?php if (!empty($data->tvehicle))
        {
            echo CHtml::encode($data->tvehicle);
        } else {
            echo CHtml::encode($data->tmake.' / '.$data->ttype);
        }
?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('tengine')); ?>:</b>
	<?php echo CHtml::encode($data->tengine); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('tchassis')); ?>:</b>
	<?php echo CHtml::encode($data->tchassis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tlicenseplate')); ?>:</b>
	<?php echo CHtml::encode($data->tlicenseplate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_id')); ?>:</b>
	<?php echo CHtml::encode($data->make_id).' '.CHtml::encode($data->type_id).CHtml::encode($data->vehicle_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_id')); ?>:</b>
	<?php echo CHtml::encode($data->engine_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('done')); ?>:</b>
	<?php echo CHtml::encode($data->done); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>
