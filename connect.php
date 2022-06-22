<?php
$servername = "localhost";
$username = "root";
$password = "";
$basename = "projekt";
// Create connection
$con = mysqli_connect($servername, $username, $password, $basename) or die('Error
connecting to MySQL server.'.mysqli_error());
mysqli_set_charset($con, "utf8");
define('UPLPATH', 'img/');
error_reporting(E_ALL ^ E_NOTICE); 
?>