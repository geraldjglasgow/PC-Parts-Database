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
    <?php include('../../SQLFILES/databaseconnect.php');
      $conn = get_connection();?>

</head>

<body>



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

        <?php include('./sidebar.php'); ?>


      </div>  <!-- end sidebar -->

      <?php
        // querying database
        if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
          $i=0;
          parse_str($_SERVER["QUERY_STRING"], $get_array);
          $table = rtrim(key($get_array), '1234567890 ');
          $get_array = array_values($get_array);
          if($table == ""){
            $q = "SELECT name, brand, series, speed, core, thread, socket, price, turbo FROM cpu";
            $query = $conn->prepare($q);
          } else{
          $q = "SELECT name, brand, series, speed, core, thread, socket, price, turbo FROM cpu WHERE ";
          while($i < sizeof($get_array)){
            $q .= "$table = '";
            $q .= $get_array[$i];
            $q .= "'";
            if($i != sizeof($get_array)-1){
              $q .= " OR ";
            }
            $i+=1;
          }
          $q .= " ORDER BY ";
          $q .= $table;
          $query = $conn->prepare($q);
          }
        }
        $query = execQuery($query, $conn);
        $result = $query->fetchAll(); // this will hold a 2d array of all retrieved elements
       ?>

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
            <p">'.$result[$j][3].'GHz Base Clock<br />';

            if(isset($result[$j][8])){
              echo ''.$result[$j][8].'GHz Turbo Boost<br />';
            }


              echo '
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
