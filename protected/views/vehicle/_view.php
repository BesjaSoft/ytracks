<div class="row" style="padding:5px; border-top: solid 1px;">
    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>
    <div class="span6">
        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
        <?php echo CHtml::encode($data->type->make->name . ' ' . $data->type->name); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('chassisnumber')); ?>:</b>
        <?php echo CHtml::encode($data->chassisnumber); ?>
        <br />
    </div>
    <div class="span3">
        <b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
        <?php echo CHtml::encode($data->year); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('color_id')); ?>:</b>
        <?php echo CHtml::encode($data->color_id); ?>
        <br />
    </div>

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('condition_id')); ?>:</b>
      <?php echo CHtml::encode($data->condition_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('modifications')); ?>:</b>
      <?php echo CHtml::encode($data->modifications); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('licenseplate')); ?>:</b>
      <?php echo CHtml::encode($data->licenseplate); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
      <?php echo CHtml::encode($data->remarks); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('bodywork_id')); ?>:</b>
      <?php echo CHtml::encode($data->bodywork_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('carrosseriesoort_id')); ?>:</b>
      <?php echo CHtml::encode($data->carrosseriesoort_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
      <?php echo CHtml::encode($data->model); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('options')); ?>:</b>
      <?php echo CHtml::encode($data->options); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('history')); ?>:</b>
      <?php echo CHtml::encode($data->history); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('engine')); ?>:</b>
      <?php echo CHtml::encode($data->engine); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('group')); ?>:</b>
      <?php echo CHtml::encode($data->group); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('first_owner')); ?>:</b>
      <?php echo CHtml::encode($data->first_owner); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('next_owners')); ?>:</b>
      <?php echo CHtml::encode($data->next_owners); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('carrossier')); ?>:</b>
      <?php echo CHtml::encode($data->carrossier); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
      <?php echo CHtml::encode($data->comment); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
      <?php echo CHtml::encode($data->published); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('ordering')); ?>:</b>
      <?php echo CHtml::encode($data->ordering); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('checked_out')); ?>:</b>
      <?php echo CHtml::encode($data->checked_out); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('checked_out_time')); ?>:</b>
      <?php echo CHtml::encode($data->checked_out_time); ?>
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