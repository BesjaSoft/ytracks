<h2>Managing ModuleText</h2>

<div class="actionBar">
[<?php echo CHtml::link('ModuleText List',array('list')); ?>]
[<?php echo CHtml::link('New ModuleText',array('create')); ?>]
</div>

<table class="dataGrid">
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('module_id'); ?></th>
    <th><?php echo $sort->link('user_id'); ?></th>
    <th><?php echo $sort->link('lang'); ?></th>
    <th><?php echo $sort->link('created'); ?></th>
	<th>Actions</th>
  </tr>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->module_id); ?></td>
    <td><?php echo CHtml::encode($model->user_id); ?></td>
    <td><?php echo CHtml::encode($model->lang); ?></td>
    <td><?php echo CHtml::encode($model->created); ?></td>
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