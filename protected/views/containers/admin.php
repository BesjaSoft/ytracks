<h2><?php echo Yii::t("container", "TITLE_MANAGE"); ?></h2>
<?php

$script = <<<EOD

function updatePage() {
	$.post($(this).attr('href'), {}, function(page) {
		$('#listPage').html(page);
		
		$('#listPage .delete_icon').bind("click", delete_icon);
	});

	return false;
}

function delete_icon(){
	if (confirm('Are you sure you want to delete the module "'+$(this).parent().parent().find(".admin_moduleHeaderTitle").html()+'"?')) {
		$.post($(this).attr('href'), {}, function(response) {
		});
		$(this).parent().parent().parent().parent().fadeOut("slow");
	}
	
	return false;
}

$(".delete_icon").click(delete_icon).ajaxError(function(event, request, settings){
  alert("Error requesting page " + settings.url);
});


EOD;

//echo CHtml::script($script);
Yii::app()->clientScript->registerScript('userListPagination', $script, CClientScript::POS_READY);

?>
<div class="actionBar">
<?php 
echo "[".CHtml::link(Yii::t("container", "BTN_ADDCONTAINER"), array("containers/create/section_id/".$section_id))."]";

?> 
</div>
<?php

if (count($containers) > 0)
{

foreach ($containers as $key => $container){
?>
<table width="100%" cellpadding="0" cellspacing="3" border="1" class="admin_containerTable">
<tr>
	<th class="admin_containerHeader">
        <div style="float: left;">
		<?php 
			echo Yii::t("container", "SECTIONID").": ".CHtml::encode($container->section_id)."; ";
			echo Yii::t("container", "STRUCTURE").": ".CHtml::encode($container->structure)."; ";
			echo Yii::t("general", "TXT_ISACTIVE").": ".($container->is_active == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO"))."; ";
			echo Yii::t("container", "RANK").": ".CHtml::encode($container->rank)."; "; 
		?>
        </div>
        <div class="admin_container_buttons">
        <?php 


        echo CHtml::link(Yii::t("container", "BTN_ADDMODULE"), array("modules/create", "container_id" => $container->id, "section_id" => $container->section_id));
        echo "&nbsp;";
        echo CHtml::link(
            CHtml::image(Yii::app()->baseUrl."/images/icons/edit.png", "Edit", array("border" => 0)),
            array("containers/update/id/".$container->id)
        );
        echo "&nbsp;";
        echo CHtml::link(
            CHtml::image(Yii::app()->baseUrl."/images/icons/delete.png", "Delete", array("border" => 0)),
            array("containers/delete/id/".$container->id."/section_id/".$container->section_id)
        );
        ?>
        </div>
	</th>
</tr>
<tr>
	<td class="admin_containerContent">
	<?php
		foreach($container->modules as $key => $value){
		?>
			<table class="admin_moduleTable">
			<tr>
				<td <?php echo ($value->is_active == 1 ? 'class="admin_moduleHeader active"' : 'class="admin_moduleHeader notactive"'); ?> > 
					<div class="admin_moduleHeaderTitle"><?php echo $value->title." (".$value->module.")"; ?></div>
					<div class="admin_moduleHeaderButtons">
						<?php 
                              echo CHtml::link(
                                CHtml::image(Yii::app()->baseUrl."/images/icons/edit.png", "edit", array("border" => 0)),
                                array("modules/update/id/".$value->id."/section_id/".$container->section_id),
                                array() 
                               ); 
                              echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/icons/delete.png", "delete", array("border" => 0)), array('modules/delete', 'id' => $value->id), array('class' => 'delete_icon', "title" => "delete"));

                            // ACTIVE / NOTACTIVE
                            echo "&nbsp;";
                            if (count($container->modules) > 1)
                            {
                                if ($value->rank > 1){
                                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/icons/arrow-up.gif", "move up", array("border" => 0)), array("modules/move", 'id' => $value->id, "direction" => "up", "section_id" => $_GET["section_id"], "container_id" => $value->container_id), array('class' => 'icon_up', "title" => "delete"));
                                }
                                echo "&nbsp;";
                                if ($value->rank < count($container->modules)){
                                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/icons/arrow-down.gif", "move down", array("border" => 0)), array("modules/move", 'id' => $value->id, "direction" => "down", "section_id" => $_GET["section_id"], "container_id" => $value->container_id), array('class' => 'icon_down', "title" => "delete"));
                                }
                            }
                                
							?>
					</div>
				</td>
				
			</tr>
			<tr>
				<td class="admin_moduleContent">
				<?php 
				
				$modules = Yii::app()->getModules();
			
                
                            
				if (strtolower($value->module) == "moduletext")
				{	
				    echo CHtml::link(Yii::t("general", "BTN_CHANGECONTENT"), 
                                array($value->module."/".
                                (isset($value->moduletextcontent->id) && $value->moduletextcontent->id > 0 ?  
                                    "update/id/".$value->moduletextcontent->id."/section_id/".$container->section_id 
                                : 
                                    "create/module_id/".$value->id."/section_id/".$container->section_id))); 
                                    
					echo "<h1>".$value->moduletextcontent->title."</h1>";
					echo $value->moduletextcontent->content;
				} else{
				
//    				if (strtolower($value->module) == "gallery")
//    				{
//    					echo CHtml::link(Yii::t("container", "BTN_ADDGALLERY"), array($value->module."/default/create/module_id/".$value->id."/section_id/".$container->section_id)); 
//    					
//    					$module = Yii::app()->getModule($value->module);
//    					$this->widget($value->view, array("module_id" => $value->id));
//    				}
    					
    				if (strtolower($value->module) == "news")
    				{
    					echo CHtml::link(Yii::t("container", "BTN_ADDNEWS"), array($value->module."/default/create/module_id/".$value->id."/section_id/".$container->section_id)); 
    				}
                    
                    $options = Relations::model()->findAll(array("condition" => "module_id = ".$value->id));
                    $options["module_id"] = $value->id;
                    //print_r($options);
                    $this->widget("application.modules.".$value->module.".components.".$value->view, array("options" => $options ));
				}
				?>
				</td>
			</tr>
			</table>
            <br />
		<?php
		}
	?>
	</td>
</tr>
</table>
<br />
<?php
}

}else{
	echo Yii::t("container", "NOCONTAINERS");
}
?>