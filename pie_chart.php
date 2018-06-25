<?php

    include_once ("JsonProcessor.php");

    $comando = 'java -jar uploads/generateFile.jar';
    exec($comando);

    $jp = new JsonProcessor();

    if(isset($_GET["students"])){
        $nameStudent = $_GET["students"];
    }
    else {
        $nameStudent = $jp ->getStudents()[0];
    }

?>

<html>
  <head>
      <script type="text/javascript" src="external_ref/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable(<?php echo json_encode($jp -> getAbilitiesStudent($nameStudent)) ?>);
          var options = { title: '<?php echo "Perfil de " . $nameStudent; ?>', is3D: true, };
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
      }
    </script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="external_ref/style.css" media="screen" />
  </head>
      <body>
          <div class="container" style="margin-top:30px">
              <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <form>
                            <select style="margin-top:60px" class="form-control custom-select custom-select-lg mb-3" name="students" onchange="this.form.submit()">
                                <option value="" selected disabled hidden>Choose here</option>
                            <?php
                                foreach( $jp -> getStudents() as $name)
                                    echo "<option value=\"$name\">$name</option>";
                            ?>
                            </select>
                        </form>
                    </div>
                    <div class="col-sm-8" id="piechart" style="width: 900px; height: 500px;">

                    </div>
                </div>
              </div>
          </div>
      </body>
        <footer class="footer">
            <div class="container">
                <p> simpaticos </p>
            </div>
        </footer>
</html>
