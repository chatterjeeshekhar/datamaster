<?php
include 'session.php';
$userac = $_SESSION['login_user'];
$i1 = $_REQUEST['i'];
$mysqlstat1 = "SELECT ID,name,email FROM contacts where user='$userac' and grp='$i1' and level=1;";
$result1 = mysqli_query($con, $mysqlstat1);
$rows1 = mysqli_num_rows($result1);

echo "<div class='table-responsive'><table id='example1' class='table table-bordered table-striped'><thead><tr>";
if($rows1 > 0)
{
echo "<th>ID</th><th>Name</th>
<th>Email</th>
</tr></thead><tbody>";

while($row1 = mysqli_fetch_array($result1))
{
echo "<tr>";
echo "<td>" . $row1['ID'] . "</td>";
echo "<td>" . $row1['name'] . "</td>";
echo "<td>" . $row1['email'] . "</td>";
echo "</tr>";
}
} //Ending IF Condition
else
{
echo "<th><center>No records to display</center></th></tr>";
}
echo "</tbody></table></div>";
?>
<html>
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

</html>