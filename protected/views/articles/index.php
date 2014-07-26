<h2><?php echo Yii::t("articles", "ARTICLE_TITLE_ALLARTICLES"); ?></h2>


<?php 

if (count($models) > 0){
$this->widget('CLinkPager',array('pages'=>$pages)); ?>

<!--
<table cellpadding="0" cellspacing="0">
  <tr>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('category_id'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
    <th><?php echo $sort->link('created'); ?></th>
    <th><?php echo $sort->link('modified'); ?></th>
  </tr>
</table>
-->

<?php foreach($models as $n=>$model): ?>
<div>
    <div class="article_title"><?php echo CHtml::link($model->title, array('details','id'=>$model->id)); ?></div>
    <div class="article_category"><?php echo Yii::t("articles", "ARTICLE_CATEGORY").": ".CHtml::encode($model->category->title); ?></div>
	<div class="article_date"><?php echo Yii::t("general", "TXT_CREATED").": ".Time::nice($model->created, "d.m.Y (H:i)"); ?></div>
	<div class="article_description"><?php echo substr(strip_tags($model->body), 0, 100); ?></div>
	<div class="dottedline"></div>
</div>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); 

}else{
	echo Yii::t("articles", "NOARTICLES");
}
?>