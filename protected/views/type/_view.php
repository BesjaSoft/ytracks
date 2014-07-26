<div class="row" style="padding:5px; border-top: solid 1px;">
    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>

    <div class="span5">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    	<?php echo CHtml::link(CHtml::encode($data->make->name), array('make/view','id'=>$data->make_id)); ?>
    	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
    	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('chassiscode')); ?>:</b>
        <?php echo CHtml::encode($data->chassiscode); ?>

    </div>
    <div class="span5">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    	<?php echo CHtml::encode($data->description); ?>
    	<br />


    	<b><?php echo CHtml::encode($data->getAttributeLabel('cartype_id')); ?>:</b>
    	<?php echo CHtml::encode($data->cartype_id); ?>
    	<br />
    </div>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('constructor_id')); ?>:</b>
	<?php echo CHtml::encode($data->constructor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bodywork_id')); ?>:</b>
	<?php echo CHtml::encode($data->bodywork_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode($data->from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('untill')); ?>:</b>
	<?php echo CHtml::encode($data->untill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motortype_id')); ?>:</b>
	<?php echo CHtml::encode($data->motortype_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorplace_id')); ?>:</b>
	<?php echo CHtml::encode($data->motorplace_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('propulsion_id')); ?>:</b>
	<?php echo CHtml::encode($data->propulsion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('topspeed')); ?>:</b>
	<?php echo CHtml::encode($data->topspeed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('length')); ?>:</b>
	<?php echo CHtml::encode($data->length); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width')); ?>:</b>
	<?php echo CHtml::encode($data->width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wheelbase')); ?>:</b>
	<?php echo CHtml::encode($data->wheelbase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spoorbreedte_voor')); ?>:</b>
	<?php echo CHtml::encode($data->spoorbreedte_voor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spoorbreedte_achter')); ?>:</b>
	<?php echo CHtml::encode($data->spoorbreedte_achter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_number')); ?>:</b>
	<?php echo CHtml::encode($data->production_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registered')); ?>:</b>
	<?php echo CHtml::encode($data->registered); ?>
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