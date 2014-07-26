<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Linker</title>
</head>

<body>

<?php

$path = Yii::app()->baseUrl;

$script = <<<EOD

        $(".page").click(function(){
            window.opener.SetUrl( "{$path}/containers/display/section_id/" + $(this).attr("id")) ;
            window.close();
        });

EOD;

Yii::app()->clientScript->registerScript('pages', $script, CClientScript::POS_READY);

?>
<h1><?php echo Yii::t("section", "LINKER_CHOOSEPAGE"); ?></h1>
<i><?php echo Yii::t("section", "LINKER_INFO"); ?></i>
<br /><br />
<?php
if (count($pages) > 0){
    
    foreach($pages as $page){
        echo "-".CHtml::link($page->name, "#", array("class" => "page", "id" => $page->id))."<br />";
    }
}else{
    echo Yii::t("section", "LINKER_NOPAGESTOCHOOSE");
}
        

?>


</body>
</html>