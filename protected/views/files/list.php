<h2>files List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New files',array('create')); ?>]
[<?php echo CHtml::link('Manage files',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('location')); ?>:
<?php echo CHtml::encode($model->location); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:
<?php echo CHtml::encode($model->user_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('directory')); ?>:
<?php echo CHtml::encode($model->directory); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('filename')); ?>:
<?php echo CHtml::encode($model->filename); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('filesize')); ?>:
<?php echo CHtml::encode($model->filesize); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('mimetype')); ?>:
<?php echo CHtml::encode($model->mimetype); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:
<?php echo CHtml::encode($model->title); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:
<?php echo CHtml::encode($model->status); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:
<?php echo CHtml::encode($model->created); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>