<h2>View Make <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Make List',array('list')); ?>]
[<?php echo CHtml::link('New Make',array('create')); ?>]
[<?php echo CHtml::link('Update Make',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Make',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Make',array('admin')); ?>]
</div>

<table class="dataGrid">
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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('code')); ?>
</th>
    <td><?php echo CHtml::encode($model->code); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('founder_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->founder_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('logo')); ?>
</th>
    <td><?php echo CHtml::encode($model->logo); ?>
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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('published')); ?>
</th>
    <td><?php echo CHtml::encode($model->published); ?>
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
