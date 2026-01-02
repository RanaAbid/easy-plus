<?php
//Local Database
$hostname="localhost";
$mysql_login="root";
$mysql_password="";
$database="easy-plus";   
// $hostname="localhost";
// $mysql_login="tatours_easyplus";
// $mysql_password="oF]QRf#{)8EU%CEH";
// $database="tatours_easypluss";   

$link = mysqli_connect($hostname,$mysql_login,$mysql_password,$database);
// Check connection
if (mysqli_connect_errno()) {
  // Start session if not already started
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $_SESSION['alert_type'] = 'error';
  $_SESSION['alert_message'] = 'Database connection failed. Please try again later.';
  header("Location: ../index.php");
  exit();
}
