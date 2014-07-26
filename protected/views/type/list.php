<h2>Type List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Type',array('create')); ?>]
[<?php echo CHtml::link('Manage Type',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>:
<?php echo CHtml::encode($model->make->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>:
<?php echo CHtml::encode($model->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('alias')); ?>:
<?php echo CHtml::encode($model->alias); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('chassiscode')); ?>:
<?php echo CHtml::encode($model->chassiscode); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('cartype_id')); ?>:
<?php echo CHtml::encode($model->cartype->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('constructor_id')); ?>:
<?php echo CHtml::encode($model->constructor->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('bodywork_id')); ?>:
<?php echo CHtml::encode($model->bodywork_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('from')); ?>:
<?php echo CHtml::encode($model->from); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('untill')); ?>:
<?php echo CHtml::encode($model->untill); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('motortype_id')); ?>:
<?php echo CHtml::encode($model->motortype_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('motorplace_id')); ?>:
<?php echo CHtml::encode($model->motorplace_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('propulsion_id')); ?>:
<?php echo CHtml::encode($model->propulsion_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('topspeed')); ?>:
<?php echo CHtml::encode($model->topspeed); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('length')); ?>:
<?php echo CHtml::encode($model->length); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('width')); ?>:
<?php echo CHtml::encode($model->width); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('height')); ?>:
<?php echo CHtml::encode($model->height); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('weight')); ?>:
<?php echo CHtml::encode($model->weight); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('wheelbase')); ?>:
<?php echo CHtml::encode($model->wheelbase); ?>
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
<?php echo CHtml::encode($model->getAttributeLabel('deleted')); ?>:
<?php echo CHtml::encode($model->deleted); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('deleted_date')); ?>:
<?php echo CHtml::encode($model->deleted_date); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>