<?php 
error_reporting(0);//$servername1 = "127.0.0.1";
$servername1 = "myorivindb.c6sfsnaqalji.ap-south-1.rds.amazonaws.com";
$username1 = "monkey";
$password1 = "0c5281acfc23e73de4a58ea5010084c1";
$dbname1 = "fastsmsx_mydata";
$tz = "570";


$con=mysqli_connect($servername1, $username1, $password1, $dbname1);if (!$con) {    die('Could not connect: ' . mysqli_error());}
?>