<h2>Modules List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Modules',array('create')); ?>]
[<?php echo CHtml::link('Manage Modules',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($ModulesList as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('container_id')); ?>:
<?php echo CHtml::encode($model->container_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('cell')); ?>:
<?php echo CHtml::encode($model->cell); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('module')); ?>:
<?php echo CHtml::encode($model->module); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('source')); ?>:
<?php echo CHtml::encode($model->source); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('view')); ?>:
<?php echo CHtml::encode($model->view); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:
<?php echo CHtml::encode($model->title); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('content')); ?>:
<?php echo CHtml::encode($model->content); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('rank')); ?>:
<?php echo CHtml::encode($model->rank); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('is_active')); ?>:
<?php echo CHtml::encode($model->is_active); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>