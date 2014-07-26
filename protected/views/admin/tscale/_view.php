<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merk')); ?>:</b>
	<?php echo CHtml::encode($data->merk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referentie')); ?>:</b>
	<?php echo CHtml::encode($data->referentie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car')); ?>:</b>
	<?php echo CHtml::encode($data->car); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('omschrijving')); ?>:</b>
	<?php echo CHtml::encode($data->omschrijving); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categorie')); ?>:</b>
	<?php echo CHtml::encode($data->categorie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modelcategory_id')); ?>:</b>
	<?php echo CHtml::encode($data->modelcategory_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
	<?php echo CHtml::encode($data->deleted); ?>
	<br />

	*/ ?>

</div>
