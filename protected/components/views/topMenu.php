
<!-- id="menu" -->
<ul >
<?php 
foreach($this->getMenu() as $menu){
    if ($menu->external_url != null)
	{
		$url = CHtml::link($menu->name, $menu->external_url."tab/".(isset($_GET["tab"]) ? $_GET["tab"] : $this->tab), array("target" => "_blank"));
	}
	if ($menu->internal_url != null)
	{
		$url = CHtml::link($menu->name, array($menu->internal_url, "tab" => isset($_GET["tab"]) ? $_GET["tab"] : $this->tab ));
	}
	if ($menu->external_url == null && $menu->internal_url == null)
	{
		$url = CHtml::link($menu->name, array("/containers/display", "section_id" => $menu->id, "tab" => isset($_GET["tab"]) ? $_GET["tab"] : $this->tab ));
	}
            
    ?>
	<li><?php echo $url; 
    // CHtml::link($menu->name, array("/containers/display", "section_id" => $menu->id, "tab" => isset($_GET["tab"]) ? $_GET["tab"] : $this->tab )); ?>
    </li>
<?php } ?>
</ul>