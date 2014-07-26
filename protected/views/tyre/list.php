<h2>Tyre List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Tyre',array('create')); ?>]
[<?php echo CHtml::link('Manage Tyre',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('code')); ?>:
<?php echo CHtml::encode($model->code); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>:
<?php echo CHtml::encode($model->make->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('published')); ?>:
<?php echo CHtml::encode($model->published); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('ordering')); ?>:
<?php echo CHtml::encode($model->ordering); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('checked_out')); ?>:
<?php echo CHtml::encode($model->checked_out); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('checked_out_time')); ?>:
<?php echo CHtml::encode($model->checked_out_time); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:
<?php echo CHtml::encode($model->created); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:
<?php echo CHtml::encode($model->modified); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>