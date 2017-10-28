 <?php
include('session.php');


  $payment_status   = $_POST['payment_status'];
  $payment_amount   = $_POST['mc_gross'] *= $_SESSION['currency_value'];
  $txn_id           = $_POST['txn_id'];
  $receiver_email   = $_POST['receiver_email'];
  $payer_email      = $_POST['payer_email'];
$credits = $_POST['custom'];
$custom_values = explode('|',$_POST['custom']);
$useraccount = $_SESSION['login_user'];
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];

include 'web/connect.php';
// Check connection


$sql = "INSERT INTO bills (user, itemcode, amount, transid, ip, stamp) VALUES ('".$custom_values[1]."', '".$custom_values[0]."', '".$payment_amount."', '".$txn_id."', '".$ipadd."', (NOW() + INTERVAL '$tz' MINUTE));";
@mysqli_query($con, $sql );

$sql2 ="insert into myorders (user,itemcode,stat) values ('".$custom_values[1]."','".$custom_values[0]."', 1);";
if(mysqli_num_rows(mysqli_query($con, "select * from myorders where user='$custom_values[1]' and itemcode='$custom_values[0]'")) > 0) {}
else {
@mysqli_query( $con, $sql2 );
}
@header('location: orders.php?success=1');
?>