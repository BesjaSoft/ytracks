<h2>Result List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Result',array('create')); ?>]
[<?php echo CHtml::link('Manage Result',array('admin')); ?>]
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
<?php echo CHtml::encode($model->getAttributeLabel('team_id')); ?>:
<?php echo CHtml::encode($model->team->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('subround_id')); ?>:
<?php echo CHtml::encode($model->subround_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('raceclass_id')); ?>:
<?php echo CHtml::encode($model->raceclass_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('number')); ?>:
<?php echo CHtml::encode($model->number); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('rank')); ?>:
<?php echo CHtml::encode($model->rank); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('classification')); ?>:
<?php echo CHtml::encode($model->classification); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('performance')); ?>:
<?php echo CHtml::encode($model->performance); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('laps')); ?>:
<?php echo CHtml::encode($model->laps); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('bonus_points')); ?>:
<?php echo CHtml::encode($model->bonus_points); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('shared_drive')); ?>:
<?php echo CHtml::encode($model->shared_drive); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('make_id')); ?>:
<?php echo CHtml::encode($model->make->name.' '.$model->type->name.' '.$model->vehicle->chassisnumber); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('engine_id')); ?>:
<?php echo CHtml::encode($model->engine_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('tyre_id')); ?>:
<?php echo CHtml::encode($model->tyre->make->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('outreason_id')); ?>:
<?php echo CHtml::encode($model->outreason_id); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('comment')); ?>:
<?php echo CHtml::encode($model->comment); ?>
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