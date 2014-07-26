<?php 

$script = <<<EOD
    
    $(".m").click(function (){
        //alert(this.rel);
        $("#module").val(this.rel);
        return false;
    });

EOD;

Yii::app()->clientScript->registerScript('imgs', $script, CClientScript::POS_READY);
?>


<h2><?php echo Yii::t("section", "TITLE_LINKTO"); ?></h2>

<div class="actionBar">
</div>

<?php 
    echo CHtml::beginForm();

?>
<table>
<tr>
    <td>
<?php

foreach($root as $section){
    echo "s: ".$section->name."<br />";
    if (count($section->containers) > 0){
        foreach($section->containers as $container){
            echo "&nbsp;&nbsp;c: ".$container->structure."<br />";
            if (count($container->modules)> 0 ){
                foreach($container->modules as $module){
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;m: ".CHtml::link($module->title, "#", array("class" => "m", "rel" => $module->id ))."<br />";
                }
            }
        }
    }
    
}

?>

</td>
    <td valign="top"><?php echo CHtml::textField("module_id", "", array("id" => "module")); ?></td>
    <td valign="top"><?php echo CHtml::submitButton(Yii::t("general", "BTN_SAVE")); ?></td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>
