<h2>Managing banners</h2>

<div class="actionBar">
[<?php echo CHtml::link('banners List',array('list')); ?>]
[<?php echo CHtml::link('New banners',array('create')); ?>]
</div>

<?php 
    $this->widget("zii.widgets.grid.CGridView",array(    
        'emptyText'=>'emptytext',   
        //'model' => $users, 
        'dataProvider'=>$userData,    
        'pager'=>array(),    
        'columns'=>array(        
            array('dataField'=>'type','header'=>'header1'),        
            array('dataField'=>'url','header'=>'header2'),        
            array(        
                'class'=>'CLinkColumn',        
                'urlExpression'=>'array("ctype/settype","id"=>$data->id)',        
                'label'=>'label',           
                'header'=>'header 3'        
            ),          
            array(        
                'class'=>'CLinkColumn',        
                'urlExpression'=>'array("ctype/setfield","id"=>$data->id)',        
                'label'=>'header 4',        
            ),
            array('class' => 'CRudColumn', 'header' => 'actions')

        ),    
    ));
?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>