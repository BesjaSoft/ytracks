<h2>View Vehicle <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Vehicle List',array('list')); ?>]
[<?php echo CHtml::link('New Vehicle',array('create')); ?>]
[<?php echo CHtml::link('Update Vehicle',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Vehicle',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Vehicle',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('type_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->type->make->name.' '.$model->type->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('reference')); ?>
</th>
    <td><?php echo CHtml::encode($model->reference); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('chassisnumber')); ?>
</th>
    <td><?php echo CHtml::encode($model->chassisnumber); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('alias')); ?>
</th>
    <td><?php echo CHtml::encode($model->alias); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('year')); ?>
</th>
    <td><?php echo CHtml::encode($model->year); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('color_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->color_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('condition_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->condition_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('modifications')); ?>
</th>
    <td><?php echo CHtml::encode($model->modifications); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('licenseplate')); ?>
</th>
    <td><?php echo CHtml::encode($model->licenseplate); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('remarks')); ?>
</th>
    <td><?php echo CHtml::encode($model->remarks); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('bodywork_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->bodywork_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('carrosseriesoort_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->carrosseriesoort_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('model')); ?>
</th>
    <td><?php echo CHtml::encode($model->model); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('options')); ?>
</th>
    <td><?php echo CHtml::encode($model->options); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('history')); ?>
</th>
    <td><?php echo CHtml::encode($model->history); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('engine')); ?>
</th>
    <td><?php echo CHtml::encode($model->engine); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('group')); ?>
</th>
    <td><?php echo CHtml::encode($model->group); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('carrossier')); ?>
</th>
    <td><?php echo CHtml::encode($model->carrossier); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('published')); ?>
</th>
    <td><?php echo CHtml::encode($model->published); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('ordering')); ?>
</th>
    <td><?php echo CHtml::encode($model->ordering); ?>
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
