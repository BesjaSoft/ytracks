<h2>ModuleText List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New ModuleText',array('create')); ?>]
[<?php echo CHtml::link('Manage ModuleText',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('module_id')); ?>:
<?php echo CHtml::encode($model->module_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:
<?php echo CHtml::encode($model->user_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:
<?php echo CHtml::encode($model->title); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('content')); ?>:
<?php echo CHtml::encode($model->content); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('lang')); ?>:
<?php echo CHtml::encode($model->lang); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:
<?php echo CHtml::encode($model->created); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>