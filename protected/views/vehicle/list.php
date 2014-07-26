<h2>Vehicle List</h2>

<div class="actionBar">
    [<?php echo CHtml::link('New Vehicle', array('create')); ?>]
    [<?php echo CHtml::link('Manage Vehicle', array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>

<?php foreach ($models as $n => $model): ?>
    <div class="item">
        <?php echo CHtml::encode($model->getAttributeLabel('type_id')); ?>:
        <?php echo CHtml::encode($model->type->make->name . ' ' . $model->type->name); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('reference')); ?>:
        <?php echo CHtml::encode($model->reference); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('chassisnumber')); ?>:
        <?php echo CHtml::encode($model->chassisnumber); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('alias')); ?>:
        <?php echo CHtml::encode($model->alias); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('year')); ?>:
        <?php echo CHtml::encode($model->year); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('color_id')); ?>:
        <?php echo CHtml::encode($model->color_id); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('condition_id')); ?>:
        <?php echo CHtml::encode($model->condition_id); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('modifications')); ?>:
        <?php echo CHtml::encode($model->modifications); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('licenseplate')); ?>:
        <?php echo CHtml::encode($model->licenseplate); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('remarks')); ?>:
        <?php echo CHtml::encode($model->remarks); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('bodywork_id')); ?>:
        <?php echo CHtml::encode($model->bodywork_id); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('carrosseriesoort_id')); ?>:
        <?php echo CHtml::encode($model->carrosseriesoort_id); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('model')); ?>:
        <?php echo CHtml::encode($model->model); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('options')); ?>:
        <?php echo CHtml::encode($model->options); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('history')); ?>:
        <?php echo CHtml::encode($model->history); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('engine')); ?>:
        <?php echo CHtml::encode($model->engine); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('group')); ?>:
        <?php echo CHtml::encode($model->group); ?>
        <br/>
        <?php echo CHtml::encode($model->getAttributeLabel('carrossier')); ?>:
        <?php echo CHtml::encode($model->carrossier); ?>
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
<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>