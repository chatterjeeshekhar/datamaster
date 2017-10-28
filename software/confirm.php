<?php
include 'web/connect.php';
include('login.php'); // Includes Login Script
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['login_user'])){
exit(header("location: home.php"));
}
$cause = $_POST['cause'];
if($cause == "reg")
{
$fname = $_POST['fname'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$user = $_POST['user'];
$pass = $_POST['pass1'];
if(mysqli_num_rows(mysqli_query($con, "select email from login where email='".$email."'")) > 0)
{
@header("location: register.php?emailused=1");
}
else
if(mysqli_num_rows(mysqli_query($con, "select email from login where user='".$user."'")) > 0)
{
@header("location: register.php?emailused=2");
}
else
 {
$stmt= "insert into login (user, password, fname, email, tel, registered, registerip, active) VALUES ('".$user."',md5('".$pass."'),'".$fname."','".$email."','".$tel."',(NOW() + INTERVAL '$tz' MINUTE),'$ipadd','A')";
mysqli_query($con, $stmt);
$rand = mt_rand();
@mysqli_query($con, "insert into verify (user, email, code) VALUES ('".$user."','".$email."', '".$rand."')");

// EMAIL FUNCTION STARTS
$cat = mysqli_fetch_array(mysqli_query($con, "select * from main"));
$email_to = $_POST['email'];
$email_sender = $cat['supportemail'];
 $email_subject = "New Registration Details: ".$cat['projectname']." Database Portal";
 $email_message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" style="background:#ddd">
        <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none">
        <div style="background:#fff;padding:0;margin:0;font-family:Verdana,Geneva,sans-serif;font-size:14px;color:#333333;line-height:22px">
    <div style="width:600px;margin:0 auto;background:#fff">
            <div style="min-height:5px;background-color:#00a65a">
                <span style="min-height:5px;background-color:#0B638C;width:100px;display:block"></span>
            </div>
            <div>
                <h1 style="color:#0B638C;font-weight:normal;text-align:left">Dear '.$fname.',</h1>
                <div style="padding:15px 15px 15px 0">
                    Your Registration details are here. As a security measure account owner verification is required before getting started.
                </div>
            </div>
            <div align="center" style="background-color:#fbfbfb; border:1px solid #f8f8f8;color:#333333;font-size:15px;line-height:29px;margin:20px 0;padding:10px">
                Username: '.$user.'<br>Verification code: '.$rand.'</div><br>
            <div style="margin:20px 0">If this was not requested by you, kindly contact us immediately on helpline@hostdude.org.
              <span style="color:#333333">Thanks once again</span>, We hope you have enjoyed our services!
            </div>
                <div style="font-size:15px">
                    Stay closer <br>
                    Team '.$cat['projectname'].' <br><br><font color="#009900" face="Webdings" size="4">P</font><font
  color="#009900" face="verdana,arial,helvetica" size="2"> <strong>Please
consider the environment before printing this email</strong></font>
                </div>
        </div>
      </body>
        </html>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= "From: {$sender_name} <{$email_sender}>"."\r\n".'X-Mailer: PHP/' . phpversion();
$fromserver = "-f".$email_sender;


// headers for attachment
@mail($email_to, $email_subject, $email_message, $headers, $fromserver);

 //////////////// EMAIL FUNCTION /////////////////////////////////////////////////////////////
}
}
if($cause == "reg2")
{
$user = $_POST['user'];
$email = $_POST['email'];
$code = $_POST['code'];
if(mysqli_num_rows(mysqli_query($con, "select * from verify where user='$user' and email='$email' and code='$code'")) > 0)
{
@mysqli_query($con, "update login set active='Y' where user='$user'");
@header("location: index.php?verified=1");
}
else {
@header("location: confirm.php?error=1");
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Verify | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
<body class="hold-transition register-page" onload="disco()">
<div class="register-box">
  <div class="register-logo">
    <a><b>Verify</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Verify your new membership</p>
<?php
if($_REQUEST['error'] == "1") {
echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Incorrect Match!</h4>
              </div>';
}
if($_POST['cause'] == "reg") {
echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Code sent on email!</h4>
              </div>';
}
?>
    <form action="" method="post">
<input type="hidden" name="cause" value="reg2" />
        
 <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user" placeholder="Registered Username" value="<?php echo $_POST['user']; ?>" required="true" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>        
 <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Registered Email" value="<?php echo $_POST['email']; ?>" required="true" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="code" placeholder="Verification Code" required="true" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
  
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required="true"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Register" />
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>-->

    <a href="/" class="text-center">I already have a membership</a><br>
 <a href="register.php" class="text-center">Register a new membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<script>
function myFunction() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
       document.getElementById("pass1").style.borderColor = "#47DE33";
        document.getElementById("pass2").style.borderColor = "#47DE33";
    }
    return ok;
}
</script>
   <script src="../../dist/js/disco.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
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
