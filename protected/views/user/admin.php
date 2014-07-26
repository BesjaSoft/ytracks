<?php

$script = <<<EOD

function updatePage() {
	$('#listPage .pager ul').after('<div style="display:inline;">Loading...</div>');
	$.post($(this).attr('href'), {}, function(page) {
		$('#listPage').html(page);
		
		$('.yiiPager a').bind("click", updatePage);
		$('#listPage #sort-buttons a').bind("click", updatePage);
		$('#listPage .delete_icon').bind("click", delete_icon);
	});

	return false;
}

function delete_user(){
	if (confirm('Are you sure you want to delete the user "'+$(this).parent().parent().parent().parent().parent().find(".username a").html()+'"?')) {
		$.post($(this).attr('href'), {}, function(response) {
		});
		$(this).parent().parent().parent().parent().parent().fadeOut("slow");
	}
	
	return false;
}

$(".delete").click(delete_user).ajaxError(function(event, request, settings){
  alert("Error requesting page " + settings.url);
});

$('#sort-buttons a, .yiiPager a').click(updatePage);

EOD;

//echo CHtml::script($script);
Yii::app()->clientScript->registerScript('userListPagination', $script, CClientScript::POS_READY);
//Yii::app()->clientScript->registerCoreScript('jquery'); //not needed when using CClientScript::POS_READY

?>

<?php echo $form; ?>
<div id="listPage">

	<?php
		$this->renderPartial('listPage', compact('users', 'pages', 'sort', 'filter'));
	?>
</div>