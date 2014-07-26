<h5>Twins or doubles?</h5>

<?php
$this->widget('application.extensions.yii-jqgrid.EJqGrid',
              array(
                    'name'=>'jqgrid1',
                    'compression'=>'none',
                    'theme'=>'redmond',
                    'useNavBar'=>true,
                    'useNavBar'=>'false',
                    'options'=>array(
                                     'datatype'=>'json',
                                     'url'=>'http://localhost/ytracks?r=individual/doublesortwins',
                                     'colNames'=>array('Index','Aircraft','BuiltBy'),
                                     'colModel'=>array(
                                                       array('name'=>'id','index'=>'id','width'=>'55','name'=>'invdate','index'=>'invdate','width'=>90),
                                                       array('name'=>'aircraft','index'=>'aircraft','width'=>90),
                                                       array('name'=>'factory','index'=>'factory','width'=>100)
                                                      ),
                                     'rowNum'=>10,
                                     'rowList'=>array(10,20,30),
                                     'sortname'=>'id',
                                     'viewrecords'=>true,
                                     'sortorder'=>"desc",
                                     'caption'=>"Airplanes from XML"
                                    )
                   )
             );
?>
