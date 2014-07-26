<h2>View Type <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Type List',array('list')); ?>]
[<?php echo CHtml::link('New Type',array('create')); ?>]
[<?php echo CHtml::link('Update Type',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Type',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Type',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->make->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>
</th>
    <td><?php echo CHtml::encode($model->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('alias')); ?>
</th>
    <td><?php echo CHtml::encode($model->alias); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>
</th>
    <td><?php echo CHtml::encode($model->description); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('chassiscode')); ?>
</th>
    <td><?php echo CHtml::encode($model->chassiscode); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('cartype_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->cartype->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('constructor_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->constructor->description); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('bodywork_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->bodywork_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('from')); ?>
</th>
    <td><?php echo CHtml::encode($model->from); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('untill')); ?>
</th>
    <td><?php echo CHtml::encode($model->untill); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('motortype_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->motortype_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('motorplace_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->motorplace_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('propulsion_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->propulsion_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('topspeed')); ?>
</th>
    <td><?php echo CHtml::encode($model->topspeed); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('length')); ?>
</th>
    <td><?php echo CHtml::encode($model->length); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('width')); ?>
</th>
    <td><?php echo CHtml::encode($model->width); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('height')); ?>
</th>
    <td><?php echo CHtml::encode($model->height); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('weight')); ?>
</th>
    <td><?php echo CHtml::encode($model->weight); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('wheelbase')); ?>
</th>
    <td><?php echo CHtml::encode($model->wheelbase); ?>
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
