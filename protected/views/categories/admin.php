<h2><?php echo Yii::t("category", "TITLE_MANAGECATERIES"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("category", "BTN_ADDNEW"),array('create')); ?>]
</div>

<div class="filter">
<?php $this->renderPartial("_filter", array("form" => $form)); ?>
</div>

<?php if (count($models) > 0){ ?>
<div class="table_wrapper">
	<div class="table_wrapper_inner">
	
<table cellpadding="0" cellspacing="0" class="dataGrid">
  <tr>
  	<th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('module'); ?></th>
    <th><?php echo $sort->link('is_newwindow'); ?></th>
    <th><?php echo $sort->link('is_active'); ?></th>
    <th><?php echo $sort->link('lang'); ?></th>
    <th><?php echo $sort->link('rank'); ?></th>
	<th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
  </tr>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
  	<td><?php echo $model->title; ?></td>
    <td>
    <?php 
        $modules = Categories::model()->getModules();
        echo $modules[$model->module]; ?></td>
    <td><?php echo ($model->is_newwindow == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO")); ?></td>
    <td><?php echo ($model->is_active == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO")); ?></td>
    <td><?php echo CHtml::encode($model->lang); ?></td>
    <td><?php echo CHtml::encode($model->rank); ?></td>
    <td>
    <div class="actions_menu">
    <ul>
	<li>
      <?php echo CHtml::link(Yii::t("general", "BTN_EDIT"),array('update','id'=>$model->id), array("class" => "edit")); ?></li>
      <li><?php echo CHtml::linkButton(Yii::t("general", "BTN_DELETE"),array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>Yii::t("general", "TXT_DELETEPROMPT", array("%s" => $model->id)),
			"class" => "delete")); ?>
			</li>
	</ul>
		</div>
	</td>
  </tr>
<?php endforeach; ?>
</table>
</div></div>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php }else{
    
    echo Yii::t("category", "NOCATEGORIES");
    
} ?>