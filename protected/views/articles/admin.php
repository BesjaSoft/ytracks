<h2><?php echo Yii::t("articles", "ARTICLE_TITLE_MANAGE"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("articles", "BTN_ADDNEW"),array('create')); ?>]
</div>

<div class="filter">
<?php $this->renderPartial("_filter", array('filter' => $filter)); ?>
</div>

<?php 

if (count($models) > 0){ ?>
<div class="table_wrapper">
	<div class="table_wrapper_inner">
	
<?php echo CHtml::beginForm('', "post", array("id" => "list")); ?>
<table cellpadding="0" cellspacing="0" width="100%">
  <tr>
  	<th><?php echo CHtml::checkBox('select', false, array("id" => "select_all")); ?></th>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
    <th><?php echo $sort->link('Aeg'); ?></th>
	<th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
  </tr>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2 ? 'even' : 'odd';?>">
  
  	<td><?php echo CHtml::checkBox("articleCheckbox[]", false, array("value" => $model->id)); ?></td>
    <td>
		<?php 
			echo '<div class="article_list_title">'.CHtml::link($model->title,array('show','id'=>$model->id)).'</div>';
			echo '<div class="article_list_user">'.CHtml::encode($model->user->firstname." ".$model->user->lastname).'</div>';
    		echo '<div class="article_list_category">'.CHtml::encode($model->category->title).'</div>'; 
		?></td>
    <td><?php  
	$status = $model->getStatusOptions();
	if ($model->status == 1){
		echo '<span class="approved">'.$status[$model->status].'</span>';
	}else{
		echo '<span class="pending">'.$status[$model->status].'</span>';;
	}
	
	?></td>
    <td>
		<?php 
			echo Yii::t("general", "TXT_CREATED").": ".CHtml::encode(Time::nice($model->created, "m.d.Y (H:i)")); 
			echo "<br />";
			echo Yii::t("general", "TXT_MODIFIED").": ".CHtml::encode(Time::nice($model->modified, "m.d.Y (H:i)")); ?></td>
    <td>
   		<div class="actions_menu">
   		<ul>
  			<li><?php echo CHtml::link(Yii::t("general", "BTN_EDIT"),array('update','id'=>$model->id), array("class" => "edit", "title" => "edit")); ?></li>
      		<li><?php echo CHtml::linkButton(Yii::t("general", "BTN_DELETE"), array(
		      	  'submit'=>'',
		      	  'params'=>array('command'=>'delete','id'=>$model->id),
		      	  'confirm'=>Yii::t("general", "TXT_DELETEPROMPT", array("%s" => $model->title)),
				  'class' => 'delete', 
				  "title" => Yii::t("general", "BTN_DELETE"))); ?></li>
		</ul>
		</div>
	</td>
  </tr>
<?php endforeach; ?>
<tr class="footer">
    <td colspan="3">
    <div class="actions_menu">
		<?php 
		echo CHtml::linkButton(Yii::t("general", "BTN_DELETEALLSELECTED"), array(
      	  'submit'=>Yii::app()->urlManager->createUrl('/articles/delete'),
      	  'params'=>array('command'=>'deleteSelected'),
      	  'confirm'=>Yii::t("general", "TXT_DELETEPROMPTALL"),
		  'class' => 'delete', 
		  "title" => Yii::t("general", "BTN_DELETEALLSELECTED")));
		?> 
		</div>
	</td>
    <td colspan="2" align="right">
	<!--  PAGINATION -->
    	<?php $this->widget('CLinkPager',array('pages' => $pages)); ?>
	<!--/  PAGINATION  -->
    </td>
</tr>
</table>
<?php echo CHtml::endForm(); ?>
</div></div>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); 
}else{
	echo Yii::t("articles", "NOARTICLES");
}

?>