<div class="row" style="padding:5px; border-top: solid 1px;">
    <div class="span1 offset1"><?php echo CHtml::image($data->getRandomImage()); ?></div>
    <div class="span6">
        <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('competition_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->competition->name), array('competition/view', 'id' => $data->competition_id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('season_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->season->name), array('season/view', 'id' => $data->season_id)); ?>
        <br />

    </div>
</div>