<?php
include 'session.php';
$weburl = $_SESSION['projectweb'];
?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | API</title>
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
            <?php echo $_SESSION['projectname']; ?> -  API Documentation
                      </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
<script type="text/javascript">
$(document).ready(function () {
        $("#btnExport").click(function () {
            $("#customers").btechco_excelexport({
                containerid: "customers"
               , datatype: $datatype.Table
            });
        });
    });
  function removeFunction(str) {
   if (confirm('Are you sure you want to delete this record?') == true) {
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
   xmlhttp.open("POST", "add-item.php?ac=1&q=" + str, true);
xmlhttp.send();
        }
window.location.reload();
  }
  else {
        
      }
  }
</script>
        <!-- Main content -->
        <section class="content">
           <ul class="timeline">

        <!-- timeline time label -->
<li class="time-label">
            <span class="bg-aqua">API Key <input type="text" style="color:black;padding-left:5px;" onClick="this.select();" value="<?php echo $_SESSION['apikey']; ?>" disabled> <button class="btn btn-primary" data-toggle='modal' data-target='#myModal'>Regenerate</button>
            </span>
        </li>        
<li class="time-label">
            <span class="bg-aqua">Send Email
            </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                
                <h3 class="timeline-header">Single Email</h3>
                <div class="timeline-body">
                    <pre><?php echo $weburl; ?>admin/api/myapi.php?user=<?php echo $_SESSION['login_user']."&apikey=".$_SESSION['apikey']; ?>&sender={SenderEmail}&to={ReceiverEmail}&cc={CCEmail}&bcc={BCCEmail}&name={SenderName}&replyto={Replyto}&subject={EmailSubject}&body={EmailContent}&myfile={SingleAttachment}</pre>
                </div>
                <div class="timeline-footer">
                    <b>Response : </b>
                    {"ErrorCode":"000","ErrorMessage":"Done","JobId":"20047","MessageData":[{"Number":"91989xxxxxxx","MessageId":"mvHdpSyS7UOs9hjxixQLvw"},{"Number":"917405080952","MessageId":"PfivClgH20iG6G5R3usHwA"}]}
                </div>
            </div>
        </li>
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                
                <h3 class="timeline-header">Multiple Email</h3>
                <div class="timeline-body">
                    <pre><?php echo $weburl; ?>admin/api/myapi.php?user=<?php echo $_SESSION['login_user']."&apikey=".$_SESSION['apikey']; ?>&sender={SenderEmail}&to={MultipleReceiverEmail}&cc={MultipleCCEmail}&bcc={MultipleBCCEmail}&name={SenderName}&replyto={Replyto}&subject={EmailSubject}&body={EmailContent}&myfile={SingleAttachment}</pre>
                </div>
                <div class="timeline-footer">
                    <b>Response : (Multiple Emails seperated by comma)</b>
                    {"ErrorCode":"000","ErrorMessage":"Done","JobId":"20047","MessageData":[{"Number":"91989xxxxxxx","MessageId":"mvHdpSyS7UOs9hjxixQLvw"},{"Number":"91999xxxxxxx","MessageId":"PfivClgH20iG6G5R3usHwA"}]}
                </div>
            </div>
        </li>
        
        
     
        <!-- /.timeline-label -->
       
        <!-- timeline time label -->
        <li class="time-label">
            <span class="bg-aqua">Check Balance
            </span>
        </li>
        <!-- /.timeline-label -->

        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                
                <h3 class="timeline-header">Check Balance API</h3>
                <div class="timeline-body">
                    <pre><?php echo $weburl; ?>admin/api/mybalance.php?user=<?php echo $_SESSION['login_user']."&apikey=".$_SESSION['apikey']; ?></pre>
                </div>
                <div class="timeline-footer">
                    <b>Response :- </b>
                    {"Balance":"yourbalance","Locked":"yourlockedcredits"}
                    
                </div>
            </div>
        </li>

        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                
                <h3 class="timeline-header">Parameter Information</h3>
                <div class="timeline-body">

                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <tr>
                            <th style="width: 200px">Parameter Name</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Account Parameters</b></td>
                        </tr>
                        <tr>
                            <td>user</td>
                            <td>Your login username</td>
                        </tr>
                        <tr>
                            <td>APIKey</td>
                            <td>Required for authentication of your account</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Email Parameters</b></td>
                        </tr>
                 
                        <tr>
                            <td>sender</td>
                            <td>Sender's email address</td>
                        </tr>
                         <tr>
                            <td>to</td>
                            <td>Receiver's email address (multiple separated by comma).</td>
                        </tr>
<tr>
                            <td>name</td>
                            <td>Sender's Name</td>
                        </tr>
<tr>
                            <td>subject</td>
                            <td>Email subject (plain text only)</td>
                        </tr>
<tr>
                            <td>body</td>
                            <td>Message Body (plain or simple html, forms not permitted)</td>
                        </tr>
                       
                        <tr>
                            <td colspan="2"><b>Optional Parameters</b></td>
                        </tr>
                         <tr>
                            <td>cc</td>
                            <td>Email addresses under CC (multiple separated by comma).</td>
                        </tr>
 <tr>
                            <td>bcc</td>
                            <td>Email addresses under BCC (multiple separated by comma).</td>
                        </tr>
<tr>
                            <td>myfile</td>
                            <td>Single Attachment (less than 25MB). Auto-blacklist account if above 25MB.</td>
                        </tr>
                    </table>
                </div>
                <div class="timeline-footer">
                    Note: Only maximum 150 email addresses are allowed.
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        ...
    </ul>


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
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your details for verification</h4>
      </div>
      <div class="modal-body" id="rslt">
 
  <form method="post" action="" autocomplete="off">                  <div class="box-body">
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                    <input type='text' name='user' class='form-control' required>                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type='password' name='pass' class='form-control' required>                     
                    </div>     
                    <div class="form-group">
                      <label for="exampleInputPassword1">Current API Key</label>
                    <input type="text" name="myapi" class="form-control" value="<?php echo $_SESSION['apikey']; ?>" readonly="readonly">           
</div>  <font color="red">All your current applications using this key will stop working!</font>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="submit" value="submit" id="Submit" class="btn btn-primary"><i class="fa fa-send-o"></i> Regenerate Key</button>
                  </div>
                </form> 
   
    
</div>
   
      
      <div class="modal-footer">
       
       
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   <?php
$subs = $_POST['submit'];
if($subs == "submit")
include 'api/changekey.php';
?>
  </body>
</html>
