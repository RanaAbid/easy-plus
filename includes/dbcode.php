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
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
