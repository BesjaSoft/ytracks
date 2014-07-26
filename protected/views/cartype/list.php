<h2>Cartype List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Cartype',array('create')); ?>]
[<?php echo CHtml::link('Manage Cartype',array('admin')); ?>]
<br />
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('alias'); ?></th>
    <th><?php echo $sort->link('description'); ?></th>
    <th><?php echo $sort->link('from'); ?></th>
    <th><?php echo $sort->link('untill'); ?></th>
    <th><?php echo $sort->link('published'); ?></th>
    <th><?php echo $sort->link('ordering'); ?></th>
    <th><?php echo $sort->link('deleted'); ?></th>
  </tr>
  </thead>
  <tbody>
  
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo CHtml::encode($model->alias); ?></td>
    <td><?php echo CHtml::encode($model->description); ?></td>
    <td><?php echo CHtml::encode($model->from); ?></td>
    <td><?php echo CHtml::encode($model->untill); ?></td>
    <td><?php echo CHtml::encode($model->published); ?></td>
    <td><?php echo CHtml::encode($model->ordering); ?></td>
    <td><?php echo CHtml::encode($model->deleted); ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>