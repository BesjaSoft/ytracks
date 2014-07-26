<!--[if !IE]>start sidebar module<![endif]-->
<?php 

$files = $this->getRecentFiles("gallery", 1, 9);

?> 
<div class="sidebar_module">
	<div class="title_wrapper">
		<h3><?php echo Yii::t("file", "TITLE_LATESTPHOTOS"); ?></h3>
		<?php echo CHtml::link(Yii::t("general", "BTN_VIEWALL"), array("/gallery/default/admin"), array("class" => "view_all_orders")); ?> 
	</div>
	<div class="gallery">
		<!--[if !IE]>start gallery inner<![endif]-->
		<div class="gallery_inner">
			
			<?php 
			if (count($files) > 0){

				foreach($files as $file){
				?> 
				<!--[if !IE]>start product<![endif]-->
				<dl class="product">
					<dt>
						
						<a href="#"><?php echo CHtml::image(Yii::app()->baseUrl.substr($file->directory, 1, strlen($file->directory))."/thumb/thumb_".$file->filename, $file->title, array("height" => 66, "width" => 79)); ?></a>
					</dt>
					<dd>
						<em><?php echo round($file->filesize / 1024, 2); ?> Kb</em>
                        <!--
						<ul>
							<li><a class="edit_product" href="#"><?php echo Yii::t("general", "BTN_EDIT"); ?></a></li>
							<li><a class="delete_product" href="#"><?php echo Yii::t("general", "BTN_DELETE"); ?></a></li>
						</ul>
                        -->
					</dd>
				</dl>
				<!--[if !IE]>end product<![endif]-->
				<?php 
				} 
			
			} else{
				echo Yii::t("file", "NOFILES");
			}
			?>	
			
		</div>
		<!--[if !IE]>end gallery inner<![endif]-->
	</div>
</div>
<!--[if !IE]>end sidebar module<![endif]-->

