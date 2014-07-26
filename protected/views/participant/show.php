<h2>View Participant <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Participant List',array('list')); ?>]
[<?php echo CHtml::link('New Participant',array('create')); ?>]
[<?php echo CHtml::link('Update Participant',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Participant',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Participant',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('individual_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->individual->first_name.' '.$model->individual->last_name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('project_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->project->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('team_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->team->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('number')); ?>
</th>
    <td><?php echo CHtml::encode($model->number); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('initial_points')); ?>
</th>
    <td><?php echo CHtml::encode($model->initial_points); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('raceclass_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->raceclass->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('checked_out')); ?>
</th>
    <td><?php echo CHtml::encode($model->checked_out); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('checked_out_time')); ?>
</th>
    <td><?php echo CHtml::encode($model->checked_out_time); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>
</th>
    <td><?php echo CHtml::encode($model->created); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>
</th>
    <td><?php echo CHtml::encode($model->modified); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('deleted')); ?>
</th>
    <td><?php echo CHtml::encode($model->deleted); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('deleted_date')); ?>
</th>
    <td><?php echo CHtml::encode($model->deleted_date); ?>
</td>
</tr>
</table>
