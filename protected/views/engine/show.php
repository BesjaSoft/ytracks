<h2>View Engine <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Engine List',array('list')); ?>]
[<?php echo CHtml::link('New Engine',array('create')); ?>]
[<?php echo CHtml::link('Update Engine',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Engine',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Engine',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->make_id); ?>
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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('code')); ?>
</th>
    <td><?php echo CHtml::encode($model->code); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('parent_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->parent_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('tuner_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->tuner_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('enginetype_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->enginetype_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('compression')); ?>
</th>
    <td><?php echo CHtml::encode($model->compression); ?>
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
