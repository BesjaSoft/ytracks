<h2>View Result <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Result List',array('list')); ?>]
[<?php echo CHtml::link('New Result',array('create')); ?>]
[<?php echo CHtml::link('Update Result',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Result',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Result',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('individual_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->individual->first_name.' '.$model->individual->last_name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('team_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->team->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('subround_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->subround_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('raceclass_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->raceclass->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('number')); ?>
</th>
    <td><?php echo CHtml::encode($model->number); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('rank')); ?>
</th>
    <td><?php echo CHtml::encode($model->rank); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('classification')); ?>
</th>
    <td><?php echo CHtml::encode($model->classification); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('performance')); ?>
</th>
    <td><?php echo CHtml::encode($model->performance); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('laps')); ?>
</th>
    <td><?php echo CHtml::encode($model->laps); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('bonus_points')); ?>
</th>
    <td><?php echo CHtml::encode($model->bonus_points); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('shared_drive')); ?>
</th>
    <td><?php echo CHtml::encode($model->shared_drive); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->make->name.' '.$model->type->name.' '.$model->vehicle->chassisnumber); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('engine_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->engine->make->name.' '.$model->engine->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('tyre_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->tyre->make->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('outreason_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->outreason->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('comment')); ?>
</th>
    <td><?php echo CHtml::encode($model->comment); ?>
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
