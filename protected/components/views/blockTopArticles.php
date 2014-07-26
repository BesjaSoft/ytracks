<br /><br /><br />
<table cellpadding="5" cellspacing="0" bgcolor="#EEF5FB" width="100%" style="border: 1px solid #D2DBE0;">
<?php


$articles = $this->getArticles(2);

if (!empty($articles))
{
	$i = 0;
	foreach($articles as $article){
?>
	<tr>
		<td rowspan="2"><?php echo CHtml::image(Yii::app()->theme->baseUrl."/images/icon_alert.jpg", ""); ?></td>
		<td width="100%">
			<div style="color: #8A3538;font-size: 12px;"><?php echo $article->title; ?></div>
			<div style="color: #707173;"><?php echo substr($article->body, 500);
			
			echo CHtml::link("loe edasi...", array("/articles/details/id/".$article->id));
			?></div>
		</td>
	</tr>

	<?php

	if (count($articles) > 1 and ($i++ < (count($articles) - 1) ) ){
	?>
	<tr>
		<td><hr size="1" /></td>
	</tr>
	
	<?php	
	}
}
}else{
	echo "Artiklid puuduvad";
}


?>
</table>