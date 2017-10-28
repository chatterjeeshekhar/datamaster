<?php
include 'session.php';
include 'web/connect.php';
$q = $_GET['q'];
if($q == "grp"){
$ppwp = $_GET['str'];
$usern = $_SESSION['login_user'];
$sql2 = "select GROUP_CONCAT(email SEPARATOR ',') allemail from contacts,groups where groups.grpname=contacts.grp and contacts.user='".$usern."' and contacts.level=1 and groups.ID='".$ppwp."';";
$result = mysqli_query($con, $sql2);
$row = mysqli_fetch_assoc($result);
$row['allemail'] = strtolower($row['allemail']);
echo $row['allemail'];
}
if($q == "temp"){
$ppwp = $_GET['str'];
$usern = $_SESSION['login_user'];
$sql2 = "select * from template where user IN ('$usern','global') and ID='$ppwp';";
$result = mysqli_query($con, $sql2);
$row = mysqli_fetch_assoc($result);
echo $row['body'];
}
?>