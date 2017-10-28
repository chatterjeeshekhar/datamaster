<?php
include 'admin/web/connect.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,$dbname1);
 $user = $_POST['user'];
$pass = $_POST['pass'];
$api = $_POST['myapi'];
$sql="UPDATE boss set apikey=SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,18) WHERE username='$user' and password=md5('$pass') and apikey= '$api'";
$result = mysqli_query($con,$sql);
if(mysqli_affected_rows($con) > 0)
{
echo '<script language="javascript">';
echo 'alert("Key changed successfully")';
echo '</script>';
header("Refresh:0");
}
else{
echo '<script language="javascript">';
echo 'alert("Key generation failed")';
echo '</script>';
}
?>
<html>
<style>
body {
font-family: Arial;
color: blue;
}
</style>
</html>