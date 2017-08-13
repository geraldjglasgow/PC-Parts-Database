<?php
function get_connection(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "pcparts";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
   } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
   }
}

function execQuery($query, $conn) {
  try {
    $conn->beginTransaction();
    $query->execute();
    $conn->commit();
    return $query;
  } catch (Exception $e) {
    $db->rollback();
  }
}

function closeconn($conn){
  $conn = null;
  return $conn;
}

?>
