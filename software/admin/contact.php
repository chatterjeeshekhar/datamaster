<?php
include 'session.php';
?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Contact Us</title>
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
            Feedback / Suggestions
            <small>advanced tables</small>
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
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Send feedback and suggestions to Developer of this software</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

<?php
include 'session.php';
$sub = (!empty($_POST['sub']) ? $_POST['sub'] : '');

if($sub == 1)
{
$regemail = $_SESSION['useremail'];
$fullname = $_SESSION['userfname']." ".$_SESSION['userlname'];
$usern = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : '';
$Comment = (!empty($_POST['Comment']) ? $_POST['Comment'] : '');

    $email_to = $_SESSION['supportemail'];    // Receiver's email
        $email_sender = $_SESSION['useremail'];  // Sender Email
$sender_name = $_SESSION['projectname']; // Sender Name
  $email_subject = "Contact Form: ".$_SESSION['projectname']; // Email Subject
  
$email_message = "Username: ".$usern."<br><br>Registered Email: ".$regemail."<br><br>Full Name: ".$fullname."<br><br>Message: ".$Comment; // Message Body
$ipadd = $_SERVER['REMOTE_ADDR']; // Client IP Address
$filevar = (!empty($_POST['Resume']) ? $_POST['Resume'] : '');
if ($filevar == NULL)
{
$filechk = "Y";
}
else {
$filechk = "N";
}
    
    // boundary
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    
    function died($error) {
        echo "Sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    
    

            
    
    
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    

    


    
    
    // multipart boundary
$email_message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_message . "\n\n";
 
foreach($_FILES as $userfile){
      // store the file information to variables for easier access
      $tmp_name = $userfile['tmp_name'];
      $type = $userfile['type'];
      $name = $userfile['name'];
      $size = $userfile['size'];

      // if the upload succeded, the file will exist
      if (file_exists($tmp_name)){

         // check to make sure that it is an uploaded file and not a system file
         if(is_uploaded_file($tmp_name)){
    
            // Open the file for a binary read
            $file = fopen($tmp_name,'rb');
    
            // Read the file content into a variable
            $data = fread($file,filesize($tmp_name));

            // Close the file
            fclose($file);
    
   
            $data = chunk_split(base64_encode($data));
         }
    
       
         $email_message .= "--{$mime_boundary}\n" .
            "Content-Type: {$type};\n" .
            " name=\"{$name}\"\n" .
            "Content-Disposition: attachment;\n" .
            " filename=\"{$fileatt_name}\"\n" .
            "Content-Transfer-Encoding: base64\n\n" .
         $data . "\n\n";
      }
   }
            

$headers = "From: {$sender_name} <{$email_sender}>"."\r\n".   // Mail will be sent from your Admin ID         
'X-Mailer: PHP/' . phpversion();
$fromserver = "-f".$email_sender;


// headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
@mail($email_to, $email_subject, $email_message, $headers, $fromserver);
echo '<h5><font color="green" face="Arial">Message Sent</font></h5>';
echo '<script language="javascript">';
echo 'alert("Message successfully sent")';
echo '</script>';


}
else {
}
?>

                <form method="post" action="" onsubmit="return ValidateForm()" autocomplete="off">                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                    <?php 
$limita = (!empty($_SESSION['login_user']) ? $_SESSION['login_user'] : ""); 
echo "<input type='text' name='usern' class='form-control' value='$limita' disabled='disabled'>"?>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Registered Email</label>
                    <?php 
$limita = (!empty($_SESSION['useremail']) ? $_SESSION['useremail'] : ""); 
echo "<input type='text' name='regemail' class='form-control' value='$limita' disabled='disabled'>"?>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Full Name</label>
                      <?php 
$limita = (!empty($_SESSION['userfname']) ? $_SESSION['userfname'] : "")." ".(!empty($_SESSION['userlname']) ? $_SESSION['userlname'] : ""); 
echo "<input type='text' name='fname' class='form-control' value='$limita' disabled='disabled'>"?>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Max Size 16 MB.</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Message</label>
                 <div class="box">
                <div class="box-header"><br>
                                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                                     <textarea required="true" class="textarea" name="Comment" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
           
                </div>
              </div>
                    </div>
                    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
                      <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>           
                                      <div class="checkbox">
                   
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="sub" value="1">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary"><i class="fa fa-send-o"></i>  Submit</button>
                  </div>
                </form> 



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
</html>
