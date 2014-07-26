<?php 

foreach ($containers as $key => $container){
?>
<table width="100%" class="admin_containerTable">
<tr>
	<td class="admin_containerContent">
	<?php 
		//print_r ($containers->modules);
		foreach($container->modules as $key => $value){
		?>
			<table class="admin_moduleTable">
			<tr>
				<td class="admin_moduleHeader"> 
					<div class="admin_moduleHeaderTitle"><?php echo $value->title." (".$value->module.")"; ?></div>
				</td>
				
			</tr>
			<tr>
				<td class="admin_moduleContent">
				<?php 
				
					if (strtolower($value->module) == "moduletext")
					{
						echo "<div id=\"upline\"></div>";
						echo "<h1>".$value->moduletextcontent->title."</h1>";
						echo $value->moduletextcontent->content;
					}
					
					if (strtolower($value->module) == "gallery")
					{
						foreach ($value->modulegallerycontent as $item){
							echo "<h2>".$item->title."</h2>";
							echo $item->description;
						}
					}
					
					if (strtolower($value->module) == "news")
					{
								
						foreach ($value->modulenewscontent as $item){
							echo "<h2>".$item->title."</h2>";
							echo $item->body;
						}
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
<?php
}

?>