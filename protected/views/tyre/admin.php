<h2>Managing Tyre</h2>

<div class="actionBar">
[<?php echo CHtml::link('Tyre List',array('list')); ?>]
[<?php echo CHtml::link('New Tyre',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('code'); ?></th>
    <th><?php echo $sort->link('make_id'); ?></th>
    <th><?php echo $sort->link('published'); ?></th>
    <th><?php echo $sort->link('ordering'); ?></th>
    <th><?php echo $sort->link('checked_out'); ?></th>
    <th><?php echo $sort->link('checked_out_time'); ?></th>
    <th><?php echo $sort->link('created'); ?></th>
    <th><?php echo $sort->link('modified'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->code); ?></td>
    <td><?php echo CHtml::encode($model->make->name); ?></td>
    <td><?php echo CHtml::encode($model->published); ?></td>
    <td><?php echo CHtml::encode($model->ordering); ?></td>
    <td><?php echo CHtml::encode($model->checked_out); ?></td>
    <td><?php echo CHtml::encode($model->checked_out_time); ?></td>
    <td><?php echo CHtml::encode($model->created); ?></td>
    <td><?php echo CHtml::encode($model->modified); ?></td>
    <td>
      <?php echo CHtml::link('Update',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>