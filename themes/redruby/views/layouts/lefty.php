<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-4">
        <p>
            <?php echo $menu; ?>
        </p>
	</div>
	<div id="content" class="span-20">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
