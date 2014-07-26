<h2>View Tyre <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Tyre List',array('list')); ?>]
[<?php echo CHtml::link('New Tyre',array('create')); ?>]
[<?php echo CHtml::link('Update Tyre',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete Tyre',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Tyre',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('code')); ?>
</th>
    <td><?php echo CHtml::encode($model->code); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->make->name); ?>
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
</table>
