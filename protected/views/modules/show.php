<h2>View Modules <?php echo $Modules->id; ?></h2>

<!--
<div class="actionBar">
[<?php echo CHtml::link('Modules List',array('list')); ?>]
[<?php echo CHtml::link('New Modules',array('create')); ?>]
[<?php echo CHtml::link('Update Modules',array('update','id'=>$Modules->id)); ?>]
[<?php echo CHtml::linkButton('Delete Modules',array('submit'=>array('delete','id'=>$Modules->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage Modules',array('admin')); ?>]
</div>
-->

<table class="dataGrid">
<tr>
	<td><?php echo CHtml::link("edit module content 2", array($Modules->module."/create/id/".$Modules->id)); ?></td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('container_id')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->container_id); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('cell')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->cell); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('module')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->module); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('source')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->source); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('view')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->view); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($Modules->getAttributeLabel('is_active')); ?>
</th>
    <td><?php echo CHtml::encode($Modules->is_active); ?>
</td>
</tr>
</table>