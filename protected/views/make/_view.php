<div class="row" style="padding:5px; border-top: solid 1px;">

    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>
    <div class="span5">
        <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('founder_id')); ?>:</b>
        <?php if (!empty($data->individual)) {
            echo CHtml::encode($data->individual->full_name);
        } ?>
        <br />
    </div>

    <?php /*

      <b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
      <?php echo CHtml::encode($data->alias); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
      <?php echo CHtml::encode($data->code); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
      <?php echo CHtml::encode($data->logo); ?>
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

      <b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
      <?php echo CHtml::encode($data->published); ?>
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