<?php

    include_once ("JsonProcessor.php");
    $jp = new JsonProcessor();
    //var_dump($jp->do_matrix());
?>

<html>
    <head>
        <script type="text/javascript" src="external_ref/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable(<?php echo json_encode($jp ->do_matrix()); ?>);

                var options = {
                    chart: {
                        title: 'Perfiles de alumnos',
                    },
                    bars: 'horizontal' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    </head>
    <body>
        <div id="barchart_material" style="width: 900px; height: 500px;"></div>
    </body>
</html>

