<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

   
    <?php
include 'session.php';
include 'web/connect.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
$i1 = $_REQUEST['i'];
$mysqlstat = "SELECT * FROM emails where ID='$i1'"; 
$result = mysqli_query($con, $mysqlstat);
if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//$cntbody = str_replace('/"','"',$row['Content']);
	echo "<center><table class='table table-bordered table-striped' border='1' width='90%' bordercolor=black><tr><td>ID</td><td>".$row['ID']."</td></tr><tr><td>From</td><td>".$row['Sender']."</td></tr><tr>";
echo "<td>Sender Name</td><td>" . $row['Name'] . "</td></tr><tr>";
echo "<td>Date and Time</td><td>" . $row['Stamp'] . "</td></tr><tr>";
 echo "<td>To</td><td>";
$recv = explode(',',$row['Receiver']);
$cntv = count($recv);
for ($i=0; $i<$cntv; $i++) {
  echo $recv[$i]."<br>";
} echo "</td></tr><tr>";
echo "<td>CC</td><td>" . $row['CC'] . "</td></tr><tr>";
echo "<td>BCC</td><td>" . $row['BCC'] . "</td></tr><tr>";

echo "<td>Reply-to</td><td>" . $row['Replyto'] . "</td></tr>";

	echo "</td></tr></table></center><br>";
	$urlstr = $_SESSION['projectweb']."admin/getcont2.php?i=".$i1;
echo "<iframe src='$urlstr' frameborder='0' width='100%' scrolling='auto' onload='resizeIframe(this)' sandbox></iframe>";
}
else {
echo "<center><br><br><b><font color='red' face='Arial'>Error Processing your request</font>";
exit(header("Location: index.php"));
}
echo mysqli_error();
?>