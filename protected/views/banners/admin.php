<h2><?php echo Yii::t("banners", "TITLE_MANAGEBANNERS"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("banners", "BTN_ADDNEW"),array('create')); ?>]
</div>

<?php if (count($models) > 0){ ?>
<div class="table_wrapper">
	<div class="table_wrapper_inner">
    
<table cellpadding="0" cellspacing="0" class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('type'); ?></th>
    <th><?php echo $sort->link('user_id'); ?></th>
    <th><?php echo $sort->link('date_showstart'); ?></th>
    <th><?php echo $sort->link('date_showend'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
	<th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php $banner_types = Banners::model()->getBannerTypes();
    echo $banner_types[$model->type]; ?></td>
    <td><?php echo ($model->user->firstname != "" ? CHtml::link($model->user->firstname." ".$model->user->lastname, array("user/show/id/".$model->id)) : "-"); ?></td>
    <td><?php echo ($model->showalltime == 1 ? Yii::t("banners", "ALLTHETIME") : date("d.m.Y", $model->date_showstart)); ?></td>
    <td><?php echo ($model->showalltime == 1 ? Yii::t("banners", "ALLTHETIME") : date("d.m.Y", $model->date_showend)); ?></td>
    <td><?php $statuses = Banners::model()->getStatusOptions();
    echo $statuses[$model->status]; ?></td>
    <td>
        <div class="actions_menu">
        <ul>
    	   <li><?php echo CHtml::link(Yii::t("general", "BTN_EDIT"),array('update','id'=>$model->id), array("class" => "edit")); ?></li>
           <li><?php echo CHtml::linkButton(Yii::t("general", "BTN_DELETE"),array(
          	  'submit'=>'',
          	  'params'=>array('command'=>'delete','id'=>$model->id),
          	  'confirm'=>Yii::t("general", "TXT_DELETEPROMPT", array("%s" => $model->id)),
                'class' => 'delete' )); ?>
              	</li>
            <li><?php echo CHtml::link(Yii::t("general", "BTN_STATISTIKA"),array('stats','id'=>$model->id), array("class" => "")); ?></li>
    	</ul>
		</div>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>

</div></div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php } else{
    
    echo Yii::t("banners", "NOBANNERS");
}