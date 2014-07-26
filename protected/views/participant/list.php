<h2>Participant List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Participant',array('create')); ?>]
[<?php echo CHtml::link('Manage Participant',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('individual_id')); ?>:
<?php echo CHtml::encode($model->individual->first_name.' '.$model->individual->last_name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('project_id')); ?>:
<?php echo CHtml::encode($model->project->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('team_id')); ?>:
<?php echo CHtml::encode($model->team->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('number')); ?>:
<?php echo CHtml::encode($model->number); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('initial_points')); ?>:
<?php echo CHtml::encode($model->initial_points); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('raceclass_id')); ?>:
<?php echo CHtml::encode($model->raceclass->name); ?>
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