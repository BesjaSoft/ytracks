<div class="form">
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl('individual/admin/'),
        'method' => 'get',
    ));
    ?>

    <?php echo $form->textFieldGroup($this->searchModel, 'first_name'); ?>
    <?php echo $form->textFieldGroup($this->searchModel, 'last_name'); ?>
    <?php
    $this->widget(
            'booster.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Search')
    );
    ?>

<?php $this->endWidget(); ?>
</div><!-- search-form -->