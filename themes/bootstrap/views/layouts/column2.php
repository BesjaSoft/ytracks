<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div id="content" class="span9 offset1">
        <?php echo $content; ?>
    </div><!-- content -->
    <div id="sidebar" class="span2">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => 'Operations',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'operations'),
        ));
        $this->endWidget();
        
        if ($this->hasAdminSearch) {
            $this->renderPartial();
        } ?>
    </div><!-- sidebar -->

</div>
<?php $this->endContent(); ?>