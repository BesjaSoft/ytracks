<h2>View ModuleText <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('ModuleText List',array('list')); ?>]
[<?php echo CHtml::link('New ModuleText',array('create')); ?>]
[<?php echo CHtml::link('Update ModuleText',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete ModuleText',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage ModuleText',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('module_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->module_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>
</th>
    <td><?php echo CHtml::encode($model->user_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($model->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>
</th>
    <td><?php echo CHtml::encode($model->content); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lang')); ?>
</th>
    <td><?php echo CHtml::encode($model->lang); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>
</th>
    <td><?php echo CHtml::encode($model->created); ?>
</td>
</tr>
</table>
