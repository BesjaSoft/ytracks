<h2>Managing files</h2>

<div class="actionBar">
[<?php echo CHtml::link('files List',array('list')); ?>]
[<?php echo CHtml::link('New files',array('create')); ?>]
</div>

<?php
if (count($models) > 0){ ?>
<div class="table_wrapper">
	<div class="table_wrapper_inner">
	
<table cellpadding="0" cellspacing="0" class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('user'); ?></th>
    <th><?php echo $sort->link('filesize'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
    <th><?php echo $sort->link('created'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo $model->user->lastname." ".$model->user->firstname; ?></td>
    <td><?php echo round($model->filesize / 1024, 2)." Kb"; ?></td>
    <td><?php echo CHtml::encode($model->status); ?></td>
    <td><?php echo Time::nice($model->created, "d.m.Y (H:i)"); ?></td>
    <td>
    <div class="actions_menu">
      <?php echo CHtml::link('Edit',array('update','id'=>$model->id), array("class" => "edit")); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?",
			"class" => "delete")); ?>
			</div>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div></div>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); 

}else{
	echo "No files";
}
?>