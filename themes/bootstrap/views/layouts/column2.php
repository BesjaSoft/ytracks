<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div id="breadcrumbs" class="span9 offset1">
        <?php
        $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        ));
        ?>
    </div><!-- content --> 
</div>
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

        if ($this->hasActionSearch) {
            $this->renderPartial($this->actionSearchForm);
        }
        ?>
    </div><!-- sidebar -->

</div>
<?php $this->endContent(); ?>