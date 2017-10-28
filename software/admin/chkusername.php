<?php
error_reporting(0);
include 'web/connect.php';
$q = $_POST['q'];

$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,$dbname1);
$sql="SELECT count(*) CNT FROM login WHERE username = '$q'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
   
    $stat = $row['CNT'];
if($stat == "1")
  echo "<font color=red>Not Available</font>";

else
if($stat == "0")
echo "<font color=green>Available</font>";

else
echo "<font color=red>Error</font>";
   
}

mysqli_close($con);
?>