<?php
include 'session.php';
?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo $_SESSION['projectname']; ?> | User Privileges Settings</title>
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
           Global User Privilege Settings  
            <small></small>
          </h1>
          
        </section>
<script>
function showHint() {
$("#loaderIcon").show();
jQuery.ajax({
url: "getactive.php",
data:'q='+$("#username").val(),
type: "GET",
success:function(data){
$("#txtHint").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Status changed with immediate affect</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


               <form name="Form" method="post" action="" onsubmit="return ValidateForm()" autocomplete="off">                
                <div class="box-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
     <input type="text" name="users" id="username" class="form-control" onBlur="showHint()">

                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Current Status</label>
                    
<span class="form-control" id="txtHint">Enter username to display status</span>
                     
                    </div>
                
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Change Status</label>
                     <select name="addcred" class="form-control" required>
<option value="">---Select---</option>
<option value="Y">Activate</option>
<option value="N">Suspend</option>
<option value="D">Restricted Account</option>
<option value="A">Pending Approval</option>
</select>
                     
                    </div>
<div class="form-group">
                      <label for="exampleInputPassword1">Ban all IP used by this user (Preventing multiple accounts) Only available for suspensions</label><br>
                 
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="0" id="option1" autocomplete="off" checked disabled> No
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="1" id="option2" autocomplete="off"> Yes </label>
</div>
<input type="hidden" name="otherinfo" value="1">
                  
             
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="sub" value="1">
                    <button type="submit" name="Submit" id="Submit" value="Continue" class="btn btn-primary"><i class="fa fa-unlock"></i>  Change Status</button>
                  </div>
                </form> 
<script>
document.getElementById("option1").disabled=true;
document.getElementById("option2").disabled=true;
</script>
<?php

$users = false;
$addcred = false;


if(isset($_POST['users']))
$users = $_POST['users'];

if(isset($_POST['addcred']))
$addcred = $_POST['addcred'];

if(isset($_POST['chkinsert']))
$chkinsert = $_POST['chkinsert'];

if(isset($_POST['otherinfo']))
$otherchk = $_POST['otherinfo'];

if($otherchk == 1)
{ 
include 'web/connect.php';
$sql ="update login set active='$addcred' where username='$users'";
mysqli_query( $con, $sql);

if($addcred == "N"){
$sql1 ="update banip set active='$chkinsert' where user='$users'";
mysqli_query( $con, $sql1);
}

if($addcred == "Y"){
$sql1 ="update banip set active='1' where user='$users'";
mysqli_query( $con, $sql1);
}

echo mysqli_error();
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
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
   
  </body>
<script>

    function calculate() {
    var myBox1 = document.getElementById('box1').value; 
    var myBox2 = document.getElementById('box2').value;
    var result1 = document.getElementById('result1'); 
    var myResult = myBox1 * myBox2;
    result1.innerHTML = myResult;

}
 window.onload = calculate;
</script>
</html>