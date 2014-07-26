<h2>View files <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('files List',array('list')); ?>]
[<?php echo CHtml::link('New files',array('create')); ?>]
[<?php echo CHtml::linkButton('Delete files',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage files',array('admin')); ?>]
</div>

<?php 

$exif = unserialize($model->exif);

?>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
	<td style="width: 545px"><h1><?php echo CHtml::encode($model->title); ?></h1></td>
<td>
	<p class="actions clear">
		<span class="btn"><span><?php echo CHtml::button("Eelmine", array("onclick" => "history.back()")); ?></span></span>
		<span class="btn"><span><?php echo CHtml::button("Jargmine", array("onclick" => "document.location=''")); ?></span></span>
	</p>

</td>
</tr>
</table>


<div class="bigimg clear">
	<div class="a clear">
	<?php 
		echo Chtml::image("../../.".$model->directory.$model->filename, "", array("border" => 0));
	?> 
	</div>
</div>

<div class="clear">
	<div class="col col07">
		<div class="h2type1"><h2>Foto detailiinfo</h2></div>
		
		<table class="details2 mt5">
			<tr>
				<th>Foto pealkiri:</th>
				<td><?php echo CHtml::encode($model->title); ?></td>
			</tr>
			<tr>
				<th>Faili nimi:</th>
				<td><?php echo CHtml::encode($model->filename); ?></td>
			</tr>
			<tr>
				<th>Faili suurus:</th>
				<td><?php echo CHtml::encode(round($model->filesize / 1024), 2); ?> KB</td>
			</tr>
			<tr>
				<th>Resolutsioon:</th>
				<td><!-- 6.7 * 5.0cm @ 300dpi -->
				<?php echo "(".$exif["width"]." * ".$exif["height"]."px)"; ?></td>
			</tr>
			<tr>
				<th>Autor:</th>
				<td></td>
			</tr>
			<tr>
			  <th>Votmesonad:</th>
			  <td> tags</td>
			</tr>
			<tr>
			  <th>Kategooriad:</th>
			  <td></td>
			</tr>
			<tr>
				<th>Kasutamise oigused:</th>
				<td>Koigile vaba</td>
			</tr>
			<tr>
				<th>Riik:</th>
				<td></td>
			</tr>
			<tr>
				<th>Linn:</th>
				<td> </td>
			</tr>
			<tr>
				<th>Foto kirjeldus:</th>
				<td> </td>
			</tr>
			</table>
</div>
	<div class="col col08">
		<div class="h2type1"><h2>Faili info / EXIF</h2></div>
		<table class="details2 mt5">
		<?php 
		
		?>
		</table>
</div>
</div>


