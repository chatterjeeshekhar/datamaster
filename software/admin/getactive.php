<?php
include 'session.php';
include 'web/connect.php';
$q = $_GET['q'];

$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,$dbname1);
$sql="SELECT active FROM login WHERE username = '$q'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$rows = mysqli_num_rows($result);
if($rows == 1) {
   
    $stat = $row['active'];
if($stat == "Y")
echo "<font color=green>Active</font>";

else
if($stat == "A")
echo "<font color=blue>Pending Approval</font>";

else
if($stat == "D")
echo "<font color=brown>Restricted Account</font>";

else
echo "<font color=red>Suspended</font>"; 
}

else
echo "<font color=red>Invalid username</font>";  

mysqli_close($con);
?>