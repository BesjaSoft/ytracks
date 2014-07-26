<?php 

if (count($stats) > 0){
    $clicks = array();
    $views = array();
    foreach($stats as $stat){
        // clicks
        $clicks[] = "['".Time::nice($stat->date, "Y-m-d")."',".$stat->clicks."]";
        // views
        $views[] = "['".Time::nice($stat->date, "Y-m-d")."',".$stat->views."]";
    }
    
    $row_clicks = "[".implode(",", $clicks)."]";
    $row_views = "[".implode(",", $views)."]";

}

$script = <<<EOD
    
    $.jqplot('chart', [{$row_clicks}, {$row_views}], {
        title:'Bänneri statistkia',
        legend: {
            show: true,
            location: 'ne',     // compass direction, nw, n, ne, e, se, s, sw, w.
        },

        //gridPadding:{right:35},
        axes:{
            xaxis:{
                renderer:$.jqplot.DateAxisRenderer,
                tickOptions:{formatString:'%d.%m.%y',
                tickInterval:'1 day'
                },
            },
             yaxis:{
                tickOptions:{formatString:'%d'},
                showTickMarks: false,
                min:0
            }
        },
        seriesDefaults:{
            showMarker:false,
            pointLabels:{
                edgeTolerance: 5
            }
        }, 
        series:[{label:'Klikkamisi', markerOptions:{show: true, style:'square'}},{label:'Vaatamisi', lineWidth:4, markerOptions:{show: true, style:'square'}}],
       

    });
EOD;

// DRAG AND DROP
Yii::app()->clientScript->registerScript('bannerStats', $script, CClientScript::POS_READY);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/jchart/jquery.jqplot.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/jchart/plugins/jqplot.dateAxisRenderer.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/jchart/plugins/jqplot.pointLabels.min.js');




Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/jquery.jqplot.min.css');

?>

<h2><?php echo Yii::t("banners", "TITLE_BANNERSTATS"); ?></h2>

<div class="actionBar">
[<?php echo CHtml::link(Yii::t("banners", "BTN_ADDNEW"),array('create')); ?>]
[<?php echo CHtml::link(Yii::t("banners", "BTN_MANAGEBANNERS"),array('admin')); ?>]
</div>

<?php

//if (count($clicks) > )
?>
<div id="chart" style="height: 400px; width: 500px;">
</div>
