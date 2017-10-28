<?php
include 'session.php';
include 'web/connect.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
$i1 = $_REQUEST['i'];
$mysqlstat = "SELECT * FROM emails where ID='$i1'"; 
$result = mysqli_query($con, $mysqlstat);
if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$cntbody = str_replace('/"','"',$row['Content']);
echo $cntbody;
}
else {
echo "<center><br><br><b><font color='red' face='Arial'>Error Processing your request</font>";
exit(header("Location: index.php"));
}
echo mysqli_error();
?>