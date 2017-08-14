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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  height: 10px;
}

th, td {
  padding: 5px;
  text-align: left;
}
.thumbnail {
  height:auto;
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
                    <a href="./mobo.php" class="list-group-item">Motherboards</a>
                </div>
            </div>
          <!-- end sidebar -->

            <div class="col-md-9">
                <div class="row">

                  <?php
                  $cname = $_GET['cname'];
                  $conn = get_connection();
                  $query = $conn->prepare("SELECT brand,type,price,socket,chipset,memoryCap,memoryStandard,usbPorts,PCI,name FROM mobo WHERE name = '$cname'");
                  try {
                    $conn->beginTransaction();
                    $query->execute();
                    $conn->commit();
                  } catch (Exception $e) {
                    $db->rollback();
                  }
                  $result = $query->fetchAll(); // this will hold a 2d array of all retrieved elements

                  echo '
                    <div class="col-sm-12 col-lg-12 col-md-12 text-center">
                      <div class="thumbnail">
                          <img style="width:180px; height:135px;" src="../../pictures/mobo/'.$result[0][9].'.jpg" alt="'.$result[0][9].'">
                          <div class="caption">
                          <h4>'.$result[0][0].'</h4>
                          <p>$'.$result[0][2].'<br />
                          '.$result[0][1].' '.$result[0][3].'<br />
                          '.$result[0][4].' chipset<br />
                          </p>
                            </div>
                          </div>
                            <div class="thumbnail">
                            <h4>Specifications</h4>
                                <table align="center" style="width:35%">
                                  <tr>
                                    <th>Brand</th>
                                    <td>'.$result[0][0].'</td>
                                  </tr>
                                  <tr>
                                    <th>Price</th>
                                    <td>$'.$result[0][2].'</td>
                                  </tr>
                                  <tr>
                                    <th>Type</th>
                                    <td>'.$result[0][1].'</td>
                                  </tr>
                                  <tr>
                                    <th>Socket</th>
                                    <td>'.$result[0][3].'</td>
                                  </tr>
                                  <tr>
                                    <th>Chipset</th>
                                    <td>'.$result[0][4].'</td>
                                  </tr>
                                  <tr>
                                    <th>Memory Type</th>
                                    <td>'.$result[0][6].'</td>
                                  </tr>
                                  <tr>
                                    <th>Max Memory</th>
                                    <td>'.$result[0][5].' GB</td>
                                  </tr>
                                  <tr>
                                    <th>USB Ports</th>
                                    <td>'.$result[0][7].'</td>
                                  </tr>
                                  <tr>
                                    <th>PCIE Slots</th>
                                    <td>'.$result[0][8].'</td>
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
