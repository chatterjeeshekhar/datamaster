<?php
include '../web/connect.php';
 $user = $_GET['user'];
$api = $_GET['apikey'];

$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,$dbname1);
$sql="SELECT balance FROM boss WHERE username = '$user' and apikey= '$api'";
$result = mysqli_query($con,$sql);


if($row = mysqli_fetch_array($result)) {
   
    echo '{"Balance":"'.$row['balance'].'","Locked":"0"}';
   
}
else
echo '{"Balance":"Error","Locked":"Error"}';
   

mysqli_close($con);
?>