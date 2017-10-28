<?php
include 'session.php';
include 'web/connect.php';
$user = $_SESSION['login_user'];
$api_key = $_SESSION['apikey'];
$q = $_POST['q'];
$str = $_POST['str'];
if($q == "group")
{
$sql = "delete from groups where grpname IN (select * from (select g.grpname from groups g,boss l where g.user=l.username and l.username='".$user."' and l.apikey='".$api_key."' and g.grpname='".$str."') AS s)";
mysqli_query($con,$sql);

$sql3 = "delete from contacts where grp IN (select * from (select c.grp from contacts c,boss l where c.user=l.username and l.username='".$user."' and l.apikey='".$api_key."' and c.grp='".$str."') AS s)";
mysqli_query($con,$sql3);
}
else
if($q == "contact")
{
$sql2 = "delete from contacts where ID IN (select * from (select c.ID from contacts c,boss l where c.user=l.username and l.username='".$user."' and l.apikey='".$api_key."' and c.ID='".$str."') AS s)";

mysqli_query($con,$sql2);
}
else
echo "Invalid request";
?>