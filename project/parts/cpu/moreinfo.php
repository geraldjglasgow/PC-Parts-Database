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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
        text-align: left;
      }
      .caption {
          height: auto;
          overflow: hidden;
      }
    </style>

    <!-- Database Connection -->
    <?php include('../../SQLFILES/databaseconnect.php'); ?>


</head>

<body>

  <!-- container -->
  <div class="container-fluid">

    <!-- Page Content -->
        <div class="row">
          <!-- sidebar -->
            <div class="col-md-2">
                <a style = "text-decoration:none" href = "../../index.php"><p class="lead">PC Parts Database</p></a>
                <div class="list-group">
                    <a href="./cpu.php" class="list-group-item">Processors</a>
                </div>
            </div>
          <!-- end sidebar -->

            <div class="col-md-9">
                <div class="row">

                  <?php
                  $cname = $_GET['cname'];
                  $conn = get_connection();
                  $query = $conn->prepare("SELECT name, brand, series, speed, core, thread, socket, gen, l3, tdp, price, turbo, l2 FROM cpu WHERE name = $cname");
                  $query->execute();
                  $result = $query->fetchAll(); // this will hold a 2d array of all retrieved elements

                  echo '
                    <div class="col-sm-12 col-lg-12 col-md-12 text-center">
                      <div class="thumbnail">
                          <img style="width:180px; height:135px;" src="../../pictures/cpu/'.$result[0][0].'.jpg" alt="'.$result[0][0].'">
                          <div class="caption">
                              <h4>'.$result[0][1].' '.$result[0][2].' '.$result[0][0].'</h4>
                              <p>'.$result[0][3].' GHz Base Clock<br />
                                '.$result[0][4].' Core '.$result[0][5].' Thread<br />
                                '.$result[0][6].' socket<br />
                              </p>
                              <p>
                            </div>
                          </div>
                            <div class="thumbnail">
                            <h4>Specifications</h4>
                                <table align="center" style="width:35%">
                                  <tr>
                                    <th>Name</th>
                                    <td>'.$result[0][0].'</td>
                                  </tr>
                                  <tr>
                                    <th>Price</th>
                                    <td>$'.$result[0][10].'</td>
                                  </tr>
                                  <tr>
                                    <th>Brand</th>
                                    <td>'.$result[0][1].'</td>
                                  </tr>
                                  <tr>
                                    <th>Generation</th>
                                    <td>'.$result[0][7].'</td>
                                  </tr>
                                  <tr>
                                    <th>Series</th>
                                    <td>'.$result[0][2].'</td>
                                  </tr>
                                  <tr>
                                    <th>Socket</th>
                                    <td>'.$result[0][6].'</td>
                                  </tr>
                                  <tr>
                                    <th>Base Clock</th>
                                    <td>'.$result[0][3].' GHz</td>
                                  </tr>
                                  <tr>
                                    <th>Turbo Clock</th>
                                    <td>'.$result[0][11].' GHz</td>
                                  </tr>
                                  <tr>
                                    <th># Cores</th>
                                    <td>'.$result[0][4].'</td>
                                  </tr>
                                  <tr>
                                    <th># Threads</th>
                                    <td>'.$result[0][5].'</td>
                                  </tr>
                                  <tr>
                                    <th>L3 Cashe</th>
                                    <td>'.$result[0][8].'MB</td>
                                  </tr>
                                  <tr>
                                    <th>L2 Cashe</th>
                                    <td>'.$result[0][12].'MB</td>
                                  </tr>
                                  <tr>
                                    <th>TDP</th>
                                    <td>'.$result[0][9].' Watts</td>
                                  </tr>
                                </table>
                              </p>
                            </div>
                    </div>';

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
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>
</html>
