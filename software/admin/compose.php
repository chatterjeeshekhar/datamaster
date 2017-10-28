<?php
include('session.php');
if($_SESSION['esign'] != "")
$esign = "<br>--<br>".$_SESSION['esign'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Compose Message</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<?php include 'web/header2.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include 'web/sidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mailbox
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="reports.php" class="btn btn-primary btn-block margin-bottom">Back to Outbox</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Groups</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <!--<li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>-->
                    <?php
include 'web/connect.php';
             $usern = $_SESSION['login_user'];
$sql1 = "select * from groups where user='".$usern."' and level=1;";

   $retval1 = mysqli_query( $con, $sql1);

                    $myrow = mysqli_num_rows($retval1);

if($myrow>0) {
// Loop through the query results, outputing the options one by one
while ($row1 = mysqli_fetch_array($retval1)) {
  $emid = $row1['ID'];
   echo '<li><a onClick="getFunction('.$emid.')"><i class="fa fa-users"></i> '.$row1['grpname'].' </a></li>';
}
}
else
echo '<li><a><i class="fa fa-users"></i> No groups available</a></li>';
// Close your drop down box
?>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">My Templates</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                   <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
  <?php
include 'web/connect.php';
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
             $usern = $_SESSION['login_user'];
$sql1 = "select * from template where user IN('".$usern."','global');";
   $retval1 = mysqli_query( $con, $sql1);
$myrow = mysqli_num_rows($retval1);

if($myrow>0) {
// Loop through the query results, outputing the options one by one
while ($row1 = mysqli_fetch_array($retval1)) {
  $emid = $row1['ID'];
if($row1['user']=="global")
   echo '<li><a onclick="getFunction3('.$emid.')"><i class="fa fa-paint-brush"></i> '.$row1['name'].' <font color=red>*</font></a></li>';
else
   echo '<li><a onclick="getFunction3('.$emid.')"><i class="fa fa-paint-brush"></i> '.$row1['name'].' </a></li>';
}
}
else
echo '<li><a><i class="fa fa-paint-brush"></i> No templates available</a></li>';
// Close your drop down box
?>
                  </ul>
              
                </div>  <!-- /.box-body -->
              </div><!-- /.box --><font color=red>*</font> These templates are pre-defined templates
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
<?php
$qqqa = $_POST['suby'];
if($qqqa == "y")
{
include 'mailer.php';
}
else {
}
?>
<?php
$ball = $_SESSION['user_balance'];
if ($ball < 1)
{
  echo '<div class="box-body"><div class="form-group">
                     <h3>Insufficient Balance in Account</h3>
                
                  </div>
                  <div class="form-group">
                       <a href="recharge.php" id="Submit" class="btn btn-primary"><i class="fa fa-money"></i>  Recharge</a>
                
                  </div></div>';
}
else
{
echo '<form enctype="multipart/form-data" name="Form" method="post" action="" onsubmit="return ValidateForm()">
                <div class="box-body">
                  <div class="form-group">
                    <input name="toemail" placeholder="To: Seperated by comma" id="recemail2" class="form-control" required="required">
                
                
                  </div>
                  <div class="form-group">
                      <input type="email" name="senderemail" placeholder="From" id="Name" maxlength="80" class="form-control">
                
                  </div>
                  <div class="form-group">
                      <input type="text" name="sendername" id="Name" maxlength="80" placeholder="Sender Name"  class="form-control">
                
                  </div>
                       
<div class="form-group">
                       <input type="email" name="replyto" id="Email" placeholder="Reply to" maxlength="80" class="form-control">
                
                  </div>
<div class="form-group">
                       <textarea name="ccemail" id="Name" placeholder="CC" class="form-control"></textarea>
                
                  </div>
    <div class="form-group">
                       <textarea name="bccemail" id="Name" placeholder="BCC" class="form-control"></textarea>
                
                  </div>
                       
                         <div class="form-group">
                     <input type="text" name="msubject" id="Phone" maxlength="80" placeholder="Subject" class="form-control">
                
                  </div>    
                      <div class="form-group">
                     <textarea id="editor1" class="form-control" name="Comment" placeholder="Message Content goes here" style="height: 300px">'.$esign.'</textarea>
                                </div>    
                      
                            
  <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="Resume">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>

        
                </div><!-- /.box-body -->
                  <div class="box-footer">
                  <button type="submit" name="Submit" value="Submit" class="btn btn-success btn-lg"><i class="fa fa-envelope-o"></i> Send now</button> <button onclick="schedulelater()" class="btn btn-warning btn-lg"><i class="fa fa-clock-o"></i> Schedule</button>
<div class="pull-right">
                    <button onclick="schedulelater()" class="btn btn-default btn-lg"><i class="fa fa-pencil"></i> Save Draft</button>
                    <input type="hidden" name="suby" value="y"><button class="btn btn-danger btn-lg" type="reset"><i class="fa fa-times"></i> Discard</button>
                  </div>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
<script>
function schedulelater() {
    alert("Feature coming soon!");
}
</script>
            </form>';
          }
            ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 <?php include 'web/footer2.php'; ?>
  <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
 $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
$(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
      });
    </script>  
    <script>
function getFunction3(str)
{
CKEDITOR.config.startupMode = 'source';
document.getElementById("editor1").innerHTML= "";
$.get("getajax.php?q=temp&str="+str , function(data, status){
        
CKEDITOR.instances.editor1.setData(data);
        });
}
</script>
<script>
function getFunction(str)
{
var contnow = $('#recemail2').val();
$.get("getajax.php?q=grp&str="+str , function(data, status){
        if(contnow.length <= 0) {
document.getElementById("recemail2").value= contnow+data; }
else {
document.getElementById("recemail2").value= contnow+","+data;
}
        });
}
</script>
  </body>
</html>


