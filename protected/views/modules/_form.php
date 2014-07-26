<div class="yiiForm">

<p>
<?php echo Yii::t("general", "TXT_REQUIREDFIELDS"); ?>
</p>

<?php echo CHtml::beginForm(); ?>

<?php 

//echo "params : " .Yii::app()->modules["gallerymodule"]["blocks"];
	echo CHtml::errorSummary($modules); 
	
	echo CHtml::activeHiddenField($modules, 'container_id', array("value" => $container_id));
	echo CHtml::activeHiddenField($modules, 'section_id', array("value" => $section_id));
	echo CHtml::activeHiddenField($modules, 'cell', array("value" => 11)); 
?>

<table>
<tr>
	<td><?php echo CHtml::activeLabelEx($modules,'module'); ?></td>
	<td><?php echo CHtml::activeDropDownList($modules,'module', Modules::model()->getModuleTypes(), array('ajax' => array('type'=>'POST', 'url'=> Yii::app()->baseUrl.'/modules/getviews', 'update'=>'#view_id'))); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($modules,'view'); ?></td>
	<td><?php 
    
    if (isset($modules->view) && $modules->view != "" && $modules->view != NULL)
    {
        $options = array();
        $data = Yii::app()->modules[$modules->module];
        if (is_array($data) && !empty($data))
        {
    	    foreach($data["blocks"] as $value=>$name)
    	    {
    	        $options[$value] = $name;
    	    }
        }
    }
    echo CHtml::activeDropDownList($modules, 'view', $options, array('id' => 'view_id')); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($modules,'title'); ?></td>
	<td><?php echo CHtml::activeTextField($modules,'title'); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($modules,'options'); ?></td>
	<td><?php echo CHtml::activeTextField($modules,'options'); ?></td>
</tr>
<tr>
	<td><?php echo CHtml::activeLabelEx($modules,'is_active'); ?></td>
	<td><?php echo CHtml::activeCheckbox($modules,'is_active'); ?></td>
</tr>
<tr>
	<td colspan="2" align="right"><?php echo CHtml::submitButton($update ?  Yii::t("general", "BTN_SAVE") : Yii::t("general", "BTN_CREATE")); ?></td>
</tr>
</table>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->