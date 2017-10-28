<?php
error_reporting(0);
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
exit(header("location: home.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Login</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <font color="red"></font>
        <?php
$subs = $_POST['submit'];
function url() {
  $rand = rand(100000, 999999);
  return $rand;
}
session_start();
$_SESSION['otp1'] = url();
$okay = $_SESSION['otp1'];

if($subs == NULL)
{
        echo "<form action='' method='post'>
            <div class='input-group margin'>
                    <input type='text' name='usernn' id='lol' class='form-control' placeholder='Enter Username'>
                    <span class='input-group-btn'>
                      <button class='btn btn-info btn-flat' type='submit' name='submit' value='submit'>Retrieve</button>
                    </span>

                  </div>
                   <a href='index.php'> Back to login</a><br>
        
        </form>";
      
      }
      else
        if($subs == "submit"){
        include 'web/connect.php';
        $con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$usernn = $_POST['usernn'];
$mysqlstat = "SELECT tel,email FROM login where username='$usernn'"; 
$result = mysqli_query($con, $mysqlstat);
$rows = mysqli_num_rows($result);
if($row = mysqli_fetch_array($result)){
  $v2 = $row['tel'];
  $v3 = $row['email'];

  //////////////// SMS FUNCTION /////////////////////////////////////////////////////////////
  
$contacts = $v2;
$from = "MAILER";
$type = "text";
$routeno = $_REQUEST['routeid'];
$panel = "control.msg91.com";
$mysqlstat2 = "SELECT projectname,supportemail,smsapi FROM main where id=1"; 
$result2 = mysqli_query($con, $mysqlstat2);
$row2 = mysqli_fetch_array($result2);
$api_key = $row2['smsapi'];
$pronm = $row2['projectname'];
$supmail = $row2['supportemail'];
$sender_name = $row2['projectname'];
$msg = "Your OTP for account '".$usernn."' is ".$okay.". Do not disclose OTP to anyone. Kindly change your password post-verification. Thank you for using ".$pronm;
$sms_text = urlencode($msg);
$api_url = "https://".$panel."/api/sendhttp.php?authkey=".$api_key."&mobiles=".$contacts."&sender=".$from."&route=4&message=".$sms_text;

//Submit to server
$response = file_get_contents($api_url);
  //////////////// SMS FUNCTION /////////////////////////////////////////////////////////////
 //////////////// EMAIL FUNCTION /////////////////////////////////////////////////////////////
  $email_to = $v3;
$email_sender = $supmail;
 $email_subject = "Forgot Password: ".$sender_name;
 $email_message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" style="background:#ddd">
        <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none">
        <div style="background:#fff;padding:0;margin:0;font-family:Verdana,Geneva,sans-serif;font-size:14px;color:#333333;line-height:22px">
    <div style="width:600px;margin:0 auto;background:#fff">
            <div style="min-height:5px;background-color:#00a65a">
                <span style="min-height:5px;background-color:#0B638C;width:100px;display:block"></span>
            </div>
            <div>
                <h1 style="color:#0B638C;font-weight:normal;text-align:left">Dear '.$usernn.',</h1>
                <div style="padding:15px 15px 15px 0">
                    Your One Time Password is here to reset your account access
                </div>
            </div>
            <div align="center" style="background-color:#fbfbfb; border:1px solid #f8f8f8;color:#333333;font-size:15px;line-height:29px;margin:20px 0;padding:10px">
                OTP: '.$okay.'<br>If this was not requested by you, kindly ignore or contact us.</div>
            <div style="margin:20px 0">
              <span style="color:#333333">Thanks once again</span>, We hope you have enjoyed our services!
            </div>
                <div style="font-size:15px">
                    Stay closer <br>
                    Team '.$pronm.'<br><br><font color="#009900" face="Webdings" size="4">P</font><font
  color="#009900" face="verdana,arial,helvetica" size="2"> <strong>Please
consider the environment before printing this email</strong></font>
                </div>
        </div>
        </body>
        </html>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= "From: {$sender_name} <{$email_sender}>"."\r\n".   // Mail will be sent from your Admin ID         
'X-Mailer: PHP/' . phpversion();
$fromserver = "-f".$email_sender;


// headers for attachment
@mail($email_to, $email_subject, $email_message, $headers, $fromserver);
 //////////////// EMAIL FUNCTION /////////////////////////////////////////////////////////////


        echo "<form action='' method='post'>
        <input type='hidden' name='ytup' value='$okay'>
         <input type='hidden' name='usernn' value='$usernn'>
          <div class='input-group margin'>
                   OTP sent to your registered email and mobile.
                    </span>

                  </div>
            <div class='input-group margin'>
                    <input type='number' name='veri' class='form-control' placeholder='Enter OTP'>
                    <span class='input-group-btn'>
                      <button class='btn btn-info btn-flat' type='submit' name='submit' value='submit2'>Verify</button>
                    </span>

                  </div>
                   <a href='index.php'> Back to login</a><br>
        
        </form>";
        
}
}
else
if($subs == "submit2"){
$oosl = $_REQUEST['ytup'];
$verif = $_REQUEST['veri'];
$usernn = $_POST['usernn'];
if($verif == $oosl)
{
  echo "<form action='' method='post'>
        <input type='hidden' name='usernn' value='$usernn'>
            <div class='input-group margin'>
             <div class='form-group has-feedback'>
                    <input type='password' name='newpas' class='form-control' placeholder='Enter New Password'>
                    </div>
                     <div class='form-group has-feedback'>

                    <input type='password' name='newpas1' class='form-control' placeholder='Repeat New Password'>
</div>
                    <br><span class='input-group-btn'>
                      <button class='btn btn-info btn-flat' type='submit' name='submit' value='submit3'>Change</button>
                    </span>

                  </div>
                   <a href='index.php'> Back to login</a><br>
        
        </form>";
}
else {
  echo "<br><font color='red'>Authentication Failed</font><br>   <a href='index.php'> Back to login</a><br>";
}
}
if($subs == "submit3") {
   include 'web/connect.php';
        $con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  $usernn = $_POST['usernn'];
  $mysqlstat5 = "SELECT password,tel,email FROM login where username='$usernn'"; 
$result5 = mysqli_query($con, $mysqlstat5);
$row5 = mysqli_fetch_array($result5);
$voldp = $row5['password'];
$np1 = $_REQUEST['newpas'];
$np2 = $_REQUEST['newpas1'];
if($np1 == $np2)
{
  $mysqlstat3 = "UPDATE login set password=md5('$np1') where username='$usernn'"; 
$result3 = mysqli_query($con, $mysqlstat3);
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];
$mysqlstat4 = "INSERT into resetpasslog (user, otp, time, oldpass, newpass, IP) values ('".$usernn."', '".$okay."', (NOW() + INTERVAL ".$tz." MINUTE), '".$voldp."', '".$np1."', '".$ipadd."')";
$result4 = mysqli_query($con, $mysqlstat4);

 
echo "<br><font color='green'>Password Changed Successfully</font><br><a href='index.php'> Back to login</a><br>";
}
else {
  echo "Passwords do not match";
}
}
        ?>
<!--
        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

       
    <!--    <a href="register.html" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <!--<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
    <!--<script src="../../bootstrap/js/bootstrap.min.js"></script>-->
    <!-- iCheck -->
    <!--<script src="../../plugins/iCheck/icheck.min.js"></script>-->
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
