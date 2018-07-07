<?php
    include_once ("JsonProcessor.php");
    require_once("../../config.php");
    global $USER, $DB, $COURSE;

    //$comando = 'java -jar uploads/generateFile.jar';
    //exec($comando);

    /* Access control */
    require_login();

    $cContext = context_course::instance($COURSE->id); // global $COURSE
    $rol = current(get_user_roles($cContext, $USER->id))->shortname;

    $jp = new JsonProcessor();
    if ($rol == 'editingteacher') {
        $act = 'visible';
        if (isset($_GET["students"])) {
            $nameStudent = $_GET["students"];
        } else {
            $nameStudent = $jp->getStudents()[0];
        }
    } elseif ($rol == 'student') {
        $act = 'hidden';
        $nameStudent = $USER -> firstname . " " . $USER -> lastname;
    }

    $troubles = $jp ->getTroublesByStudent($nameStudent);

?>

<html>
  <head>
      <title> Notificaciones </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="external_ref/loader.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      <script src="external_ref/bootstrap-notify.min.js"></script>
      <script src="external_ref/chartFunctions.js"></script>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="external_ref/animate.css"/>
      <link rel="stylesheet" type="text/css" href="external_ref/style.css" media="screen" />
  </head>
      <body>
          <div class="container" style="margin-top:30px">
              <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <form>
                            <select style="visibility:<?php echo $act; ?>" class="form-control custom-select custom-select-lg mb-3" name="students" onchange="this.form.submit()">
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
          <script type="text/javascript">

              <?php
                    if ($rol == 'student'):
                        for($i = 0; $i < count($troubles); $i++): ?>
                                showNotify(getMessage('<?php echo $troubles[$i]?>'),'', 'danger');
              <?php     endfor;
                    endif;
              ?>

              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                  var data = google.visualization.arrayToDataTable(<?php echo json_encode($jp -> getAbilitiesStudent($nameStudent)) ?>);
                  var options = { title: '<?php echo "Perfil de " . $nameStudent; ?>', is3D: true, };
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
              }


          </script>
      </body>
        <footer class="footer">
            <div class="container">
                <p> simpaticos </p>
            </div>
        </footer>
</html>
