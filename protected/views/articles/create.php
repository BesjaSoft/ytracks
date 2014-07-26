<h2><?php echo Yii::t("articles", "ARTICLE_TITLE_ADDNEW"); ?></h2>

<div class="actionBar">
<?php 
if (Yii::app()->user->isAdmin) {
    echo "[".CHtml::link(Yii::t("articles", "BTN_MANAGE"),array('admin'))."]";
}else{
    echo "[".CHtml::link(Yii::t("articles", "BTN_MYARTICLES"),array('list'))."]";
} 
?>
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>