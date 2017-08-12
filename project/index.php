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
  <?php include('./SQLFILES/databaseconnect.php'); ?>

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
          <a href="#" class="list-group-item">Power Supplies</a>
        </div>
      </div>
      <!-- end sidebar -->

      <div class="col-md-9">
        <div class="row">

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
