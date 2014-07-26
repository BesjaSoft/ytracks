<h2>View Outreason <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Outreason List',array('list')); ?>]
[<?php echo CHtml::link('New Outreason',array('create')); ?>]
[<?php echo CHtml::link('Update Outreason',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Outreason',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Outreason',array('admin')); ?>]
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
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>
</th>
    <td><?php echo CHtml::encode($model->description); ?>
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
