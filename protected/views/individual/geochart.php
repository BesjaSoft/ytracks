<?php
    //$model = new Individual();
    //$list = $model->getCountNationalities();
?>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>
    google.load('visualization', '1', {'packages': ['geochart']});
    google.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Individuals'],
            ['Netherlands', 200],
            ['United States of America', 300],
            ['Brazil', 400],
            ['Canada', 500],
            ['France', 600],
            ['Great Britain', 700]
        ]);

        var options = {
            displayMode: 'markers',
            colorAxis: {colors: ['yellow', 'red']}
        };

        var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    ;
</script>

<div id="chart_div" style="width: 960px; height: 650px;"></div>
