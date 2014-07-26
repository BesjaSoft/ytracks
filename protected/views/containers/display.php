<?php 

if (!empty($containers)){
	foreach ($containers as $key => $container){
	?>
	<table width="100%" class="containerTable" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td class="containerContent">
		<?php
			foreach($container->modules as $key => $value)
            {
			?>
				<div class="moduleContent">
					<?php 
					
					$modules = Yii::app()->getModules();
					
					if (strtolower($value->module) == "moduletext")
					{

						echo '<h1>'.$value->moduletextcontent->title."</h1>";
						echo '<div>'.$value->moduletextcontent->content.'</div>';
					}else{
					
//    					if (strtolower($value->module) == "gallery")
//    					{
//    						$module = Yii::app()->getModule("gallery");
//    						//$this->widget($module->BasePath."\components\RecentImages");
//    						//echo "id - ".$value->id;
//    						$this->widget($value->view, array("module_id" => $value->id));
//    					}
    					
    					//if (strtolower($value->module) == "news")
    //					{
    //                        $this->widget("application.modules.news.components.".$value->view, array("options" => $value->options));
    //					}
                        $options = Relations::model()->findAll(array("condition" => "module_id = ".$value->id));
                        $options["module_id"] = $value->id;
                        $this->widget("application.modules.".$value->module.".components.".$value->view, array("options" => $options));
                    }   
						
					?>
                </div>
			<?php
			}
		?>
		</td>
	</tr>
	</table>
	<?php
	}
}else{
	echo Yii::t("container", "NOCONTENT");
}

?>