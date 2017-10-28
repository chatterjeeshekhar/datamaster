<?php
include 'session.php';
?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Modify Account</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini" onload="calculate()">
    <div class="wrapper">
<?php include 'web/header2.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include 'web/sidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Change username
            <small></small>
          </h1>
          
        </section>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "getactive.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Username changed with immediate affect</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


               <form name="Form" method="post" action="" onsubmit="return ValidateForm()" autocomplete="off">                
                <div class="box-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
     <input type="text" name="users" class="form-control" placeholder="Enter current username">

                     
                    </div>
                   
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">New username <span id="user-availability-status"></span></label>
                     <input name="newuser" id="username" class="form-control" placeholder="Enter New Username" onBlur="checkAvailability()"  onKeyPress="checkAvailability()" onKeyUp="checkAvailability()" required>
                     
                    </div>
             
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="sub" value="1">
                    <button type="submit" name="Submit" id="Submit" value="Continue" class="btn btn-primary"><i class="fa fa-legal"></i>  Change username</button>
                  </div>
                </form> 
<?php

$users = false;
$newuser = false;


if(isset($_POST['users']))
$users = $_POST['users'];

if(isset($_POST['newuser']))
$newuser = $_POST['newuser'];

if($users!=NULL && $newuser!=NULL)
{
include 'web/connect.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$sql1 ="update login set username='$newuser' where username='$users'";
    $retval1 = mysqli_query($con,$sql1);
$rows1 = mysqli_affected_rows($con);
if($rows1 > 0)
{
$sql2 ="update bills set username='$newuser' where username='$users'";
    $retval2 = mysqli_query($con,$sql2);

$sql3 ="update contacts set user='$newuser' where user='$users' and level=2";
    $retval3 = mysqli_query($con,$sql3);

$sql4 ="update groups set user='$newuser' where user='$users' and level=2";
    $retval4 = mysqli_query($con,$sql4);

$sql5 ="update emails set user='$newuser' where user='$users'";
    $retval5 = mysqli_query($con,$sql5);

$sql6 ="update resetpasslog set user='$newuser' where user='$users'";
    $retval6 = mysqli_query($con,$sql6);

echo "<script>alert('Username modification in process...');</script>";
}
else
echo "<script>alert('No users exists with username specified..');</script>";
}

?>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <?php include 'web/footer2.php'; ?>

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
     <script>

function checkAvailability() {
if(document.getElementById("username").innerHTML == "") {
document.getElementById("user-availability-status").innerHTML = "";
}
$("#loaderIcon").show();
jQuery.ajax({
url: "chkusername.php",
data:'q='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
              </script>

   
  </body>

</html>