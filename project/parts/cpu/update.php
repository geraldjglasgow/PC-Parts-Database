<?php
include('../../SQLFILES/databaseconnect.php');


// querying database
$conn = get_connection();
$query = $conn->prepare("SELECT speed FROM cpu");
$query->execute();
$result = $query->fetchAll(); // this will hold a 2d array of all retrieved elements



$speedarr = array();
$j=0;
while($j<sizeof($result)){
  array_push($speedarr, $result[$j][0] => '');
  $j+=1;
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $j=0;
  while($j<sizeof($speedarr)){
    $speedarr[$result[$j][0]] = isset($_GET['s'$j'']);

    $j+=1;
  }




?>
