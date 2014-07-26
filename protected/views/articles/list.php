<h2><?php echo Yii::t("articles", "ARTICLE_TITLE_MYARTICLES"); ?></h2>

<div class="actionBar">
<?php 
if (Yii::app()->user->isAdmin){
    echo "[".CHtml::link('Manage articles',array('admin'))."]";
}else{
    echo "[".CHtml::link(Yii::t("articles", "BTN_ADDNEW"),array('create'))."]";
}
?>
</div>

<?php 

if (count($models) > 0){
$this->widget('CLinkPager',array('pages'=>$pages)); ?>

<table cellpadding="0" cellspacing="0" class="dataGrid">
  <tr>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('category_id'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
    <th><?php echo $sort->link('created'); ?></th>
    <th><?php echo $sort->link('modified'); ?></th>
    <th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
  </tr>
  
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->title,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->category->title); ?></td>
    <td><?php 
	
 		$status = Articles::getStatusOptions();
 		echo $status[$model->status];
	?></td>
    <td><?php echo CHtml::encode(Time::nice($model->created, "d.m.Y (H:i)")); ?></td>
    <td><?php echo CHtml::encode(Time::nice($model->modified, "d.m.Y (H:i)")); ?></td>
    <td>
	 <?php echo CHtml::link(Yii::t("general", "BTN_EDIT"),array('update','id'=>$model->id), array("class" => "edit")); ?>
      <?php echo CHtml::linkButton(Yii::t("general", "BTN_DELETE"),array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>Yii::t("general", "TXT_DELETEPROMPT", array("%s" => $model->id)))); ?>
	</td>
  </tr>
<?php endforeach; ?>
</table>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); 

}else{
	echo Yii::t("general", "NOARTICLES");
}
?>