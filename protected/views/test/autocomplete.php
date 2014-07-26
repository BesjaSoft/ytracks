<div class="simple">
<?php
echo CHtml::activeLabel($model,'IndividualID');

/*
* which fields should be displayed in the info part
* label => columns of model to display
*/
$info_fields=array(
'Name'=>array('full_name'),
'EMail'=>array('EMail'),
'Country'=>array('nationality'),
);


/*
* glue for multiple columns if no glue value is given <br /> is used
*/
$info_glues=array(
'Name'=>'&nbsp;',
);


/* js list pattern for the drop down list */
$list_pattern="'<small>'+i + '/' + max + ':</small> <b>' + row.lastname +' '+row.firstname+ '</b><br /><small>'+ row.email+ ' '+ row.country+ '</small>'";


/*
* set colModel (columns to select for display and return)
* tablecolumn => options
* 0 - display name  ( not used yet maybe for generated js info pattern etc.
* 1 - datafield
* 2 - searchpattern eg. name: country:
* 3 - searchable (2 -> yes and default, 1 -> yes, 0 -> no.)
*/

$colModel=array();
$colModel['ID'] = array('ID','id','id',1);   // searchable
$colModel['FullName'] = array('full_name','full_name','full_name',2); // searchable and default
//$colModel['FirstName'] = array('FirstName','firstname','firstname',1); // searchable
$colModel['EMail'] = array('EMail','email','email',1); // searchable
$colModel['Nationality'] = array('Nationality','nationality','nationality',1); // searchable


$ac_select_options=array(
       'model' =>$model,   // your model object of the admin form
       'select_model'=> Individual::model(),  // model class of the selection
       'attribute' => "IndividualID",  // which attribute
       'actionPrefix'=>'pro.',  // has to be the same as in the controller
       'name'=>'IndividualID',   // name
       'colmodel'=>$colModel,
       'buttonLabel'=>'User',  // label of the change button 'change ...'
       'default_search_data_field'=>'full_name',  // default data field for setting in the search field
       'default_data_field'=>'id',  // default data field for setting the value of the hidden field on selection
       'info_fields'=>$info_fields,
       'info_glues'=>$info_glues,
       'list_pattern'=>$list_pattern,
);

$ACSelectobj=$this->createWidget('application.extensions.acselect.ACSelect',$ac_select_options);
$ACSelectobj->run();
?>
</div>
<?php
/*
Yii::import('ext.jqAutocomplete');
echo 'bla';
$json_options = array(
	'script'=> $this->createUrl('test/json',array('json'=>'true','limit'=>6)) . '&',
	'varName'=>'input',
	'shownoresults'=>true,
	'maxresults'=>16,
	'callback'=>'js:function(obj){ $(\'#json_info\').html(\'you have selected: \'+obj.id + \' \' + obj.value + \' (\' + obj.info + \')\'); }'
);
jqAutocomplete::addAutocomplete('#test_json',$json_options);
*/
/*

// comment out (and comment the one above) to test XML
$xml_options = array(
	'script'=> $this->createUrl('test/xml',array('limit'=>6)) . '&',
	'varName'=>'input',
	'json' => false,
	'shownoresults'=>true,
	'maxresults'=>16,
	'callback'=>'js:function(obj){ $(\'#xml_info\').html(\'you have selected: \'+obj.id + \' \' + obj.value + \' (\' + obj.info + \')\'); }'
);

jqAutocomplete::addAutocomplete('#test_xml',$xml_options); */
?>