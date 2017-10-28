<?php
include 'web/connect.php';
include 'session.php';
$q = $_POST['q'];
$ac = $_POST['ac'];
if($ac == 1)
{
$sql ="update emails set stat=0 where id='$q'";

    $retval = mysqli_query( $con, $sql );
 }
else
if($ac == 0){
$sql ="update emails set stat=1 where id='$q'";

    $retval = mysqli_query( $con, $sql );
}
?>