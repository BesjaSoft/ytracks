<!--[if !IE]>start sidebar module<![endif]-->
<div class="sidebar_module">
	<div class="title_wrapper">
		<h3><?php echo Yii::t("cms", "TITLE_STATISTICS"); ?></h3>
	</div>
	<div id="statistics">
	<?php 
	foreach ($this->getStatistics() as $name => $stats){
 	?>
		<dl>
			<dt><?php 
            switch($name){
                case "users":
                    echo Yii::t("cms", "STATS_USERS");
                    break;
                case "companies":
                    echo Yii::t("cms", "STATS_COMPANIES");
                    break;
                case "images":
                    echo Yii::t("cms", "STATS_IMAGES");
                    break;
                case "images_anonymous":
                    echo Yii::t("cms", "STATS_IMAGESANONYMOUS");
                    break;
                case "inbox":
                    echo Yii::t("cms", "STATS_INBOX");
                    break;
            }
            ?> kokku:</dt>
			<dd><?php echo $stats; ?></dd>
		</dl>
	<?php } ?>
	</div>
</div>
<!--[if !IE]>end sidebar module<![endif]-->