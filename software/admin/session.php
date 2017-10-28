<?php
error_reporting(0);
debug_backtrace() || die ("Direct access not permitted");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include 'web/connect.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    // Storing Session

$user_check=(!empty($_SESSION['login_user']) ? $_SESSION['login_user'] : null);
$otherchk = null;
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con,"select * from boss where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);

$ses_sql2=mysqli_query($con,"select * from main where id=1");
$row2 = mysqli_fetch_assoc($ses_sql2);
//GLOBAL VARIABLES
$_SESSION['softwarelicense'] = $row2['license'];
$_SESSION['univalert'] = $row2['univalert'];
$_SESSION['smsapi'] = $row2['smsapi'];
$_SESSION['smsrate'] = $row2['smsrate'];
$_SESSION['projectname'] =$row2['projectname'];
$_SESSION['projectweb'] = $row2['weburl'];
$_SESSION['supportweb'] = $row2['supporturl'];
$_SESSION['supportemail'] = $row2['supportemail'];
$_SESSION['paypalemail'] = $row2['paypal'];
$_SESSION['extcode'] = str_replace('/"','"',$row2['extcode']);
$_SESSION['paysand'] = $row2['paysand'];

//DATABASE CONNECTIVITY
$_SESSION['dbhost'] = "localhost";
$_SESSION['dbuser'] = "shekharc_mailer";
$_SESSION['dbpass'] = "business98@";
$_SESSION['dbname'] = "shekharc_mailer";

$login_session =$row['username'];

$_SESSION['nonce'] = $nonce = md5('salt'.microtime());
$_SESSION['userfname'] =$row['fname'];
$_SESSION['apikey'] =$row['apikey'];
$_SESSION['userlname'] =$row['lname'];
$_SESSION['useremail'] =$row['email'];
$_SESSION['user_balance'] =$row['balance'];
$_SESSION['user_total'] =$row['total'];
$_SESSION['esign'] =$row['signature'];
$_SESSION['user_address'] =$row['address'];
$_SESSION['user_city'] =$row['city'];
$_SESSION['user_country'] =$row['country'];
$_SESSION['user_tel'] =$row['tel'];



$curvalue = file_get_contents($_SESSION['projectweb']."currency.php");
$_SESSION['currency_value'] = $curvalue-4;



// END
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
unset($_SESSION['login_user']);
header('Location: index.php'); // Redirecting To Home Page
}
?>