<?php
include 'session.php';
include 'web/connect.php';
$q = $_POST['q'];
$r = $_POST['r'];
$id = $_POST['str'];

if($q == "ver"){
$query = "update verify set ".$r."=2 where ID=".$id;
mysqli_query($con, $query);
}

if($q == "unver"){
$query = "update verify set ".$r."=1 where ID=".$id;
mysqli_query($con, $query);
}

if($q == "delete"){
$query = "update verify set ".$r."=0 where ID=".$id;
mysqli_query($con, $query);
}

if($q == "e0"){
$query = "update verify set econf=0 where ID=".$id;
mysqli_query($con, $query);
}

if($q == "e1"){
$query = "update verify set econf=1 where ID=".$id;
mysqli_query($con, $query);
}

if($q == "m0"){
$query = "update verify set mconf=0 where ID=".$id;
mysqli_query($con, $query);
}

if($q == "m1"){
$query = "update verify set mconf=1 where ID=".$id;
mysqli_query($con, $query);
}
?>