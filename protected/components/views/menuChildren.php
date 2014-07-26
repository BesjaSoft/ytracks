
<!-- id="menu" -->
<div style="position: relative;">
<ul id="menu">
<?php 
foreach($this->getMenu() as $menu){
    if ($menu->external_url != null)
	{
		$url = CHtml::link($menu->name, $menu->external_url, array("target" => "_blank"));
	}
	if ($menu->internal_url != null)
	{
		$url = CHtml::link($menu->name, array($menu->internal_url));
	}
	if ($menu->external_url == null && $menu->internal_url == null)
	{
		$url = CHtml::link($menu->name, array("/containers/display", "section_id" => $menu->id ));
	}
            
    ?>
	<li><?php echo $url; 
    // CHtml::link($menu->name, array("/containers/display", "section_id" => $menu->id, "tab" => isset($_GET["tab"]) ? $_GET["tab"] : $this->tab )); ?>
    </li>
<?php } ?>
</ul>
</div>