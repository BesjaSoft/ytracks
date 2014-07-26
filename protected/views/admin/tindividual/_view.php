<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id),
            array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('content_id')); ?>:</b>
<?php echo CHtml::encode($data->content_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
<?php echo CHtml::encode($data->last_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
<?php echo CHtml::encode($data->first_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
<?php echo CHtml::encode($data->full_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</b>
<?php echo CHtml::encode($data->nickname); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('individual_id')); ?>:</b>
<?php echo CHtml::encode($data->individual->full_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
<?php echo CHtml::encode($data->height); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
      <?php echo CHtml::encode($data->weight); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
      <?php echo CHtml::encode($data->gender); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
      <?php echo CHtml::encode($data->date_of_birth); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('place_of_birth')); ?>:</b>
      <?php echo CHtml::encode($data->place_of_birth); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('country_of_birth')); ?>:</b>
      <?php echo CHtml::encode($data->country_of_birth); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
      <?php echo CHtml::encode($data->nationality); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('date_of_death')); ?>:</b>
      <?php echo CHtml::encode($data->date_of_death); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('place_of_death')); ?>:</b>
      <?php echo CHtml::encode($data->place_of_death); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('country_of_death')); ?>:</b>
      <?php echo CHtml::encode($data->country_of_death); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
      <?php echo CHtml::encode($data->picture); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
      <?php echo CHtml::encode($data->address); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('postcode')); ?>:</b>
      <?php echo CHtml::encode($data->postcode); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
      <?php echo CHtml::encode($data->city); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
      <?php echo CHtml::encode($data->state); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
      <?php echo CHtml::encode($data->country); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
      <?php echo CHtml::encode($data->description); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('done')); ?>:</b>
      <?php echo CHtml::encode($data->done); ?>
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