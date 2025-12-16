<?php
//Local Database
$hostname="localhost";
$mysql_login="root";
$mysql_password="";
$database="easy-plus";   


$link = mysqli_connect($hostname,$mysql_login,$mysql_password,$database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
