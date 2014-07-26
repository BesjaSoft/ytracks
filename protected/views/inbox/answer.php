<h2><?php echo Yii::t("inbox", "TITLE_SENDANANSWER"); ?></h2>

<div class="actionBar">
<?php
    echo "[".CHtml::link(Yii::t("inbox", "BTN_CREATEMESSAGE"), array("/inbox/create"))."]";
?>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$message)); ?>