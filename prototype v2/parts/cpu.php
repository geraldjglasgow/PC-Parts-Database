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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

    <!-- Database Connection -->
    <?php include('../SQLFILES/databaseconnect.php'); ?>


</head>

<body>

  <?php
    $s1 = $_GET['query'];
    // querying database
    $conn = get_connection();
    $query = $conn->prepare("$s1");
    $query->execute();
    $result = $query->fetchAll(); // this will hold a 2d array of all retrieved elements

    // getting prices
    $speed = $conn->prepare("SELECT speed from cpu GROUP BY speed ORDER BY speed ASC");
    $speed->execute();
    $speedresult = $speed->fetchAll();

   ?>

  <!-- container -->
  <div class="container-fluid">

    <!-- Page Content -->
        <div class="row">
          <!-- sidebar -->
            <div class="col-md-2">
                <a style = "text-decoration:none" href = "../index.php"><p class="lead">PC Parts Database</p></a>
                <div class="list-group">
                    <a href="./cpu.php?query=SELECT name, brand, series, speed, core, thread, socket, price FROM cpu" class="list-group-item">Processors</a>
                </div>
                <!-- Single button -->
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Speed <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <?php
                    $i=0;
                    while($i<sizeof($speedresult)){
                      echo '<li><a href="cpu.php?query=SELECT name, brand, series, speed, core, thread, socket, price FROM cpu WHERE speed ='.$speedresult[$i][0].'">'.$speedresult[$i][0].'</a></li>';
                      $i+=1;
                    }
                     ?>
                  </ul>


            </div>
          <!-- end sidebar -->

            <div class="col-md-10">
                <div class="row">

                  <?php

                  $j=0;
                  while($j<sizeof($result)){
                  echo '
                    <div class="col-sm-5 col-lg-3 col-md-4 text-center">
                      <div class="thumbnail">
                          <img src="../pics/'.$result[$j][0].'.jpg" alt="'.$result[$j][0].'">
                          <div class="caption">
                              <h4>'.$result[$j][1].' '.$result[$j][2].' '.$result[$j][0].'</h4>
                              <p>'.$result[$j][3].'GHz Base Clock<br />
                                '.$result[$j][4].' Core '.$result[$j][5].' Thread<br />
                                '.$result[$j][6].' socket<br />
                                $'.$result[$j][7].'<br />
                              </p>
                              <p>
                                   <a href="moreinfo.php?cname='.$result[$j][0].'&db=cpu" class="btn btn-default">More Info</a>
                              </p>
                          </div>
                      </div>
                    </div>';
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
