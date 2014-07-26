<div class="row" style="padding:5px; border-top: solid 1px;">
    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>

    <div class="span5">
        <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name . ' (' . $data->code . ')'), array('view', 'id' => $data->id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('country_code')); ?>:</b>
        <?php echo $data->getFlag($data->country_code); ?>
        <br />
    </div>
    <?php /*
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