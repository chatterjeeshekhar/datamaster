<?php
include 'session.php';
include 'web/connect.php';
$q = $_GET['q'];

$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,$dbname1);
$sql="SELECT balance FROM login WHERE username = '$q'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
   
    echo $row['balance'];
   
}

mysqli_close($con);
?>