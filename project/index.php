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
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Database Connection -->
  <?php include('./SQLFILES/databaseconnect.php');
  $conn = get_connection(); ?>

</head>

<body>
  <!-- container -->
  <div class="container-fluid">
    <!-- Page Content -->
    <div class="row">
      <!-- sidebar -->
      <div class="col-md-2">
        <a style = "text-decoration:none" href = "./index.php"><p class="lead">PC Parts Database</p></a>
        <div class="list-group">
          <a href="./parts/cpu/cpu.php" class="list-group-item">Processors</a>
          <a href="./parts/gpu/gpu.php" class="list-group-item">Video Cards</a>
          <a href="./parts/ram/ram.php" class="list-group-item">Memory</a>
          <a href="./parts/mobo/mobo.php" class="list-group-item">Motherboards</a>
          <a href="./parts/psu/psu.php" class="list-group-item">Power Supplies</a>
        </div>
      </div>
      <!-- end sidebar -->
      <?php
      $q = "SELECT name, brand, series, speed, core, thread, socket, price FROM cpu WHERE gen LIKE '%X' AND name <> '7900X'";
      $query = $conn->prepare($q);
      $query = execQuery($query, $conn);
      $result = $query->fetchAll();
       ?>

      <div class="col-md-9"><div class = "lead"> Featured Items </div>
        <div class="row">


           <?php
          //  CPU
           $j=0;
           while($j<sizeof($result)){
             echo '
             <div class="col-sm-5 col-lg-3 col-md-4 text-center">
             <div class="thumbnail">
             <img src="./pictures/cpu/'.$result[$j][0].'.jpg" alt="'.$result[$j][0].'">
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
              // GPU
              $q = "SELECT gpu, brand, coreClock, price, name, memory FROM gpumem NATURAL JOIN videoCard WHERE name LIKE '%ti%' AND coreClock > 1520";
              $query = $conn->prepare($q);
              try {
                $conn->beginTransaction();
                $query->execute();
                $conn->commit();
              } catch (Exception $e) {
                $db->rollback();
              }
              $result = $query->fetchAll();
             $j=0;
             while($j<sizeof($result)){
               echo '
               <div class="col-sm-5 col-lg-3 col-md-4 text-center">
               <div class="thumbnail">
               <img src="./pictures/gpu/'.$result[$j][4].'.jpg" alt="'.$result[$j][4].'">
               <div class="caption">
               <h4>'.$result[$j][1].' '.$result[$j][0].'</h4>
               <p">$'.$result[$j][3].'<br />
               '.$result[$j][2].' MHz Core Clock<br />
               '.$result[$j][5].'GB Video Memory<br />
               </p>
               <a href="./moreinfo.php?cname='.$result[$j][4].'">More Info</a>
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
  </div>
    <!-- /.container -->

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
  <!-- /.container -->

  <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
