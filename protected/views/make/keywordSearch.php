<div>
<?php echo CHtml::beginForm(array($this->controller->getRoute()), 'get'); ?>
<?php echo Chtml::label('Keyword Search ', 'searchbox'); ?>
<?php echo Chtml::textField('searchbox', $this->controller->currentSearchValue, array('size'=>20,'maxlength'=>128)); ?>
<?php echo CHtml::submitButton('Search'); ?>
<?php echo CHtml::endForm(); ?>
</div>