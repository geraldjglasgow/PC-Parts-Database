<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PC Parts Database</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Database Connection -->
    <?php include('../../SQLFILES/databaseconnect.php'); ?>

</head>

<body>

  <?php
    // querying database
    $conn = get_connection();
    $query = $conn->prepare("SELECT name, brand, series, speed, core, thread, socket, price FROM cpu");
    $query->execute();
    $result = $query->fetchAll(); // this will hold a 2d array of all retrieved elements

    $form = array('2.7' => '' , '2.8' => '', '2.9'=>'','3.0' => '' , '3.1' => '', '3.2'=>'', '3.3'=>'', '3.4'=>'', '3.5'=>'',
     '3.6' => '' , '3.7' => '', '3.8'=>'','3.9' => '' , '4.0' => '', '4.1'=>'', '4.2'=>'', '4.3'=>'');
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // overwrite the form array
    $form['2.7'] = isset($_GET['s1']);
    $form['2.8'] = isset($_GET['s2']);
    $form['2.9'] = isset($_GET['s3']);
    $form['3.0'] = isset($_GET['s4']);
    $form['3.1'] = isset($_GET['s5']);
    $form['3.2'] = isset($_GET['s6']);
    $form['3.3'] = isset($_GET['s7']);
    $form['3.4'] = isset($_GET['s8']);
    $form['3.5'] = isset($_GET['s9']);
    $form['3.6'] = isset($_GET['s10']);
    $form['3.7'] = isset($_GET['s11']);
    $form['3.8'] = isset($_GET['s12']);
    $form['3.9'] = isset($_GET['s13']);
    $form['4.0'] = isset($_GET['s14']);
    $form['4.1'] = isset($_GET['s15']);
    $form['4.2'] = isset($_GET['s16']);
    $form['4.3'] = isset($_GET['s17']);
    }

   ?>

  <!-- container -->
  <div class="container-fluid">
    <!-- Page Content -->
    <div class="row">
      <!-- sidebar -->
      <div class="col-md-2">
        <a href = "/PC-Parts-Database/project/index.php" style = "text-decoration:none"><p class="lead">PC Parts Database</p></a>
        <div class="list-group">
          <a href="cpu.php" class="list-group-item">Processors</a>
        </div>

<!-- ************** ************** ************** ************** ************** ************** ************** ************** -->
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style = "text-decoration:none;">
        Speed</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
        <form action="/PC-Parts-Database/project/parts/cpu/cpu.php" method="get">
          <input type="checkbox" name="s1" value="2.7" <?php echo $form['2.7'] ? 'checked' : '' ?> /> 2.7<br>
          <input type="checkbox" name="s2" value="2.8" <?php echo $form['2.8'] ? 'checked' : '' ?> /> 2.8<br>
          <input type="checkbox" name="s3" value="2.9" <?php echo $form['2.9'] ? 'checked' : '' ?> /> 2.9<br>
          <input type="checkbox" name="s4" value="3.0" <?php echo $form['3.0'] ? 'checked' : '' ?> /> 3.0<br>
          <input type="checkbox" name="s5" value="3.1" <?php echo $form['3.1'] ? 'checked' : '' ?> /> 3.1<br>
          <input type="checkbox" name="s6" value="3.2" <?php echo $form['3.2'] ? 'checked' : '' ?> /> 3.2<br>
          <input type="checkbox" name="s7" value="3.3" <?php echo $form['3.3'] ? 'checked' : '' ?> /> 3.3<br>
          <input type="checkbox" name="s8" value="3.4" <?php echo $form['3.4'] ? 'checked' : '' ?> /> 3.4<br>
          <input type="checkbox" name="s9" value="3.5" <?php echo $form['3.5'] ? 'checked' : '' ?> /> 3.5<br>
          <input type="checkbox" name="s10" value="3.6" <?php echo $form['3.6'] ? 'checked' : '' ?> /> 3.6<br>
          <input type="checkbox" name="s11" value="3.7" <?php echo $form['3.7'] ? 'checked' : '' ?> /> 3.7<br>
          <input type="checkbox" name="s12" value="3.8" <?php echo $form['3.8'] ? 'checked' : '' ?> /> 3.8<br>
          <input type="checkbox" name="s13" value="3.9" <?php echo $form['3.9'] ? 'checked' : '' ?> /> 3.9<br>
          <input type="checkbox" name="s14" value="4.0" <?php echo $form['4.0'] ? 'checked' : '' ?> /> 4.0<br>
          <input type="checkbox" name="s15" value="4.1" <?php echo $form['4.1'] ? 'checked' : '' ?> /> 4.1<br>
          <input type="checkbox" name="s16" value="4.2" <?php echo $form['4.2'] ? 'checked' : '' ?> /> 4.2<br>
          <input type="checkbox" name="s17" value="4.3" <?php echo $form['4.3'] ? 'checked' : '' ?> /> 4.3<br>

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
<!-- ########################################################################################### -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style = "text-decoration:none;">
        Collapsible Group 2</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
  <!-- ########################################################################################### -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" style = "text-decoration:none;">
        Collapsible Group 3</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
</div>
<!-- ************** ************** ************** ************** ************** ************** ************** ************** -->

      </div>  <!-- end sidebar -->

      <div class="col-md-10">
        <div class="row">
          <?php
          $j=0;
          while($j<sizeof($result)){
            echo '
            <div class="col-sm-5 col-lg-3 col-md-4 text-center">
            <div class="thumbnail">
            <img src="../../pictures/cpu/'.$result[$j][0].'.jpg" alt="'.$result[$j][0].'">
            <div class="caption">
            <h4>'.$result[$j][1].' '.$result[$j][2].' '.$result[$j][0].'</h4>
            <p">'.$result[$j][3].'GHz Base Clock<br />
            '.$result[$j][4].' Core '.$result[$j][5].' Thread<br />
            '.$result[$j][6].' socket<br />
            $'.$result[$j][7].'<br />
            </p>
            <a href="./moreinfo.php?cname='.$result[$j][0].'">More Info</a>
            </div>
            </div>
            </div>
            ';
            $j +=1;
          }
          ?>
        </div>
      </div>
    </div>
  <!-- Container -->
  </div>

  <!-- Footer -->
  <div class="container">
    <hr>
    <!-- Footer -->
    <footer>
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; PC Parts Database 2017</p>
        </div>
      </div>
    </footer>
  </div>
  <!-- Bootstrap Core JavaScript -->
  <script type="text/javascript" src="../project/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../project/js/bootstrap.min.js"></script>

</body>
</html>
