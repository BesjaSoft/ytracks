<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('individual_id')); ?>:</b>
    <?php echo CHtml::Link( CHtml::encode($data->individual->full_name)
                          , array('individual/view','id'=>$data->individual_id)
                          ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
    <?php echo CHtml::Link( CHtml::encode($data->project->name)
                          , array('project/view','id'=>$data->project_id)
                          ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_id')); ?>:</b>
	<?php echo CHtml::encode($data->team->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rank')); ?>:</b>
	<?php echo CHtml::encode($data->rank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('points')); ?>:</b>
	<?php echo CHtml::encode($data->points); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raceclass_id')); ?>:</b>
	<?php echo CHtml::encode($data->raceclass_id); ?>
	<br />

	<?php /*
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