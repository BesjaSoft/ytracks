<?php
//$this->breadcrumbs=array(
//	'Users Messages'=>array('index'),
//	'Create',
//);
?>
<h2><?php echo Yii::t("inbox", "TITLE_CREATEMESSAGE"); ?></h2>

<div class="actionBar">
	[<?php echo CHtml::link(Yii::t("inbox", "BTN_MANAGEMESSAGES"),array('admin')); ?>]
</div><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>