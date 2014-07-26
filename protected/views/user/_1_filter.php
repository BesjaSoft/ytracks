<?php 

return array(
    'type' => 'form',
    'title'=>'Filter',
    'model' => $filter,
    'method' => 'GET',
    'elements'=>array(
        'keyword'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'isikukood'=>array(
            'type'=>'text',
            'maxlength'=>11,
        ),
    ),
 
    'buttons'=>array(
        'filter'=>array(
            'type'=>'submit',
            'label'=>'Start filtering',
        ),
    ),
);

?>