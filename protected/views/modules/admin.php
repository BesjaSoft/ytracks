<h2>Managing Modules</h2>

<div class="actionBar">
[<?php echo CHtml::link('Modules List',array('list')); ?>]
[<?php echo CHtml::link('New Modules',array('create')); ?>]
</div>

<table class="dataGrid">
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('container_id'); ?></th>
    <th><?php echo $sort->link('cell'); ?></th>
    <th><?php echo $sort->link('view'); ?></th>
    <th><?php echo $sort->link('rank'); ?></th>
    <th><?php echo $sort->link('is_active'); ?></th>
	<th>Actions</th>
  </tr>
<?php foreach($ModulesList as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->container_id); ?></td>
    <td><?php echo CHtml::encode($model->cell); ?></td>
    <td><?php echo CHtml::encode($model->view); ?></td>
    <td><?php echo CHtml::encode($model->rank); ?></td>
    <td><?php echo CHtml::encode($model->is_active); ?></td>
    <td>
      <?php echo CHtml::link('Update',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>