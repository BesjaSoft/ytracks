<div class="row" style="padding:5px; border-top: solid 1px;">
    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>
    <div class="span5">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
    	<?php echo CHtml::link(CHtml::encode($data->full_name), array('view', 'id'=>$data->id)); ?>
    	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
        <?php echo CHtml::encode($data->date_of_birth); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
        <?php echo CHtml::encode($data->gender); ?>
        <br />
    </div>
    <div class="span2">
    	<b><?php echo CHtml::encode($data->getAttributeLabel('Nationality')); ?>:</b>
    	<?php echo CHtml::Image($data->getFlag($data->nationality, array('size' => '24x24'))); ?>
    	<br />

    </div>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
    <?php echo CHtml::encode($data->last_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
    <?php echo CHtml::encode($data->first_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
    <?php echo CHtml::encode($data->alias); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
    <?php echo CHtml::encode($data->height); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('place_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->place_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->country_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($data->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_death')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_death); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place_of_death')); ?>:</b>
	<?php echo CHtml::encode($data->place_of_death); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_of_death')); ?>:</b>
	<?php echo CHtml::encode($data->country_of_death); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture_small')); ?>:</b>
	<?php echo CHtml::encode($data->picture_small); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postcode')); ?>:</b>
	<?php echo CHtml::encode($data->postcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
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