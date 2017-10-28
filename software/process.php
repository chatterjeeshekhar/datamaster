<?php
include 'session.php';
include 'web/connect.php';
$businessemail = $_SESSION['paypalemail'];
$itemno = $_REQUEST['itemno'];
$usern = $_SESSION['login_user'];
if(mysqli_num_rows(mysqli_query($con, "select * from myorders where user='$usern' and itemcode='$itemno'")) > 0) {
header ('location: buy.php?error=2');
exit(); }
else {
$cad = mysqli_fetch_array(mysqli_query($con, "select * from dblist where itemcode=".$itemno));
$totalinr = $cad['price'];
$itemn = $_SESSION['projectname']." ".$cad['name']." Database";


$totalbill1 = ($totalinr /= $_SESSION['currency_value'])*0.943;
$totalbill = round($totalbill1 , 2);
$notifyurl = $_SESSION['projectweb']."mypayment.php";
$cancelurl = $_SESSION['projectweb']."buy.php?error=1";
$useremail = $_SESSION['useremail'];

$paysand = $_SESSION['paysand'];
$url = "https://www.".$paysand."/cgi-bin/webscr"."?cmd=_xclick"."&business=".$businessemail."&email=".$useremail."&item_name=".$itemn."&item_number=1&amount=".$totalbill."&currency_code=USD&return=".$notifyurl."&shopping_url=".$_SESSION['projectweb']."&custom=".$_REQUEST['itemno']."|".$usern."&no_note=1&cancel_return=".$cancelurl."&notify_url=".$notifyurl;


header ('location:'.$url);
exit();
}
?>