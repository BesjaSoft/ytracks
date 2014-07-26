<h2><?php echo Yii::t("user", "USER_TITLE_ALLUSERS"); ?></h2>


<div class="actionBar">
[<?php echo CHtml::link(Yii::t("user", "BTN_ADDNEW"),array('create')); ?>]
</div>

<div class="filter">
<?php //$this->renderPartial("_filter", array("form" => $form)); ?>
</div>

<div class="table_wrapper">
	<div class="table_wrapper_inner">
	
	
<div class="pager">
<?php $this->widget('CLinkPager',array('pages' => $pages, 'cssFile'=>Yii::app()->request->baseUrl.'/css/pager.css')); ?>
</div>

<table cellpadding="0" cellspacing="0" width="100%">
<thead>
	<tr id="sort-buttons">
		<th><?php echo $sort->link('user.username'); ?></th>
		<th><?php echo $sort->link('user.email'); ?></th>
		<th><?php echo $sort->link('user.created'); ?></th>
		<th><?php echo $sort->link('user.email_confirmed'); ?></th>
		<th><?php echo Yii::t("general", "TXT_ACTIONS"); ?></th>
	</tr>
</thead>
<?php foreach($users as $n => $user): ?>
	<tr class="<?php echo $n%2 ? 'even' : 'odd' ?>">
		<td class="username"><?php echo CHtml::link(CHtml::encode($user->username), array('show', 'id'=>$user->id)); ?></td>
		<td><?php echo CHtml::mailto($user->email, $user->email); ?></td>
		<td><?php echo Time::nice($user->created, "d.m.Y (H:i)"); ?></td>
		<td><?php if($user->activated){
		   echo '<span class="approved">'.Yii::t("general", "TXT_YES").'</div>';
           }else{
             echo '<span class="pending">'.Yii::t("general", "TXT_NO").'</div>'; 
           }
           ?></td>
		<td>
            <?php if ($user->id != 1) { ?>
			<div class="actions_menu">
			<ul>
			<li><?php echo CHtml::link(Yii::t("general", "BTN_EDIT"), array('update','id' => $user->id), array("class" => "edit", "title" => "edit")); ?></li>
			<li><?php
			
			//I am using a normal link below instead of this for unobtrusive javascript with jquery
			//just to remind myself
			//echo CHtml::linkButton('Delete', array('submit' => array('delete', 'id' => $user->id), 'confirm' => 'Are you sure?'));
				echo CHtml::link(Yii::t("general", "BTN_DELETE"), array('delete', 'id' => $user->id), array('class' => 'delete', "title" => "delete"));
			?></li>
			</ul>
			</div>
            <?php } ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<!--  PAGINATION -->
<?php $this->widget('CLinkPager',array('pages' => $pages)); ?>
<!--/  PAGINATION  -->



</div></div>