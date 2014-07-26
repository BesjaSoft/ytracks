<div class="row" style="padding:5px; border-top: solid 1px;">
    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>

    <div class="span5">
        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('make_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->make->name, array('/make/view', 'id' => $data->make_id))); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->type->fullname, array('/type/view', 'id' => $data->type_id))); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_id')); ?>:</b>
        <?php echo CHtml::encode($data->vehicle_id); ?>
        <br />
    </div>
    
    <div class="span5">        
        <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
        <?php echo CHtml::encode($data->description); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('reference')); ?>:</b>
        <?php echo CHtml::encode($data->reference); ?>
        <br />
    </div>
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
      <?php echo CHtml::encode($data->year); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
      <?php echo CHtml::encode($data->color); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('raceno')); ?>:</b>
      <?php echo CHtml::encode($data->raceno); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('livery')); ?>:</b>
      <?php echo CHtml::encode($data->livery); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('event')); ?>:</b>
      <?php echo CHtml::encode($data->event); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('drivers')); ?>:</b>
      <?php echo CHtml::encode($data->drivers); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
      <?php echo CHtml::encode($data->category_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('scale_id')); ?>:</b>
      <?php echo CHtml::encode($data->scale_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('modeltype_id')); ?>:</b>
      <?php echo CHtml::encode($data->modeltype_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('material_id')); ?>:</b>
      <?php echo CHtml::encode($data->material_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
      <?php echo CHtml::encode($data->created); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
      <?php echo CHtml::encode($data->modified); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
      <?php echo CHtml::encode($data->deleted); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('deleted_date')); ?>:</b>
      <?php echo CHtml::encode($data->deleted_date); ?>
      <br />

     */ ?>

</div>