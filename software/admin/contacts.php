<?php
error_reporting(0);
include 'session.php';
?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Data Tables</title>
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
          <h1>Contacts List</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
<script>
 function removeFunction(str) {
   if (confirm('Are you sure you want to delete this contact?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "deletecontact.php",
data:'q=contact&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});

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
                  <h3 class="box-title"><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Add New</button>
<button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal2'>Import from Excel</button></h3> <a href='group.php' class='btn btn-warning'>Add New Group</a> 
                </div><!-- /.box-header -->
                <div class="box-body">

<?php
include 'web/connect.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userac = $_SESSION['login_user'];

$mysqlstat = "SELECT * FROM contacts where user='$userac' and level=1 ORDER BY name ASC";
$result = mysqli_query($con, $mysqlstat);
$rows = mysqli_num_rows($result);

echo "<div class='table-responsive'><table id='example1' class='table table-bordered table-striped'><thead><tr>";
if($rows > 0)
{
echo "<th>ID</th><th>Name</th>
<th>Email</th>
<th>Groups</th><th>Delete</th></tr></thead><tbody>";

while($row = mysqli_fetch_array($result))
{
$emid = $row['ID'];
  $emid = '"'.$emid.'"';
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['grp'] . "</td>";
echo "<td><a onclick='removeFunction($emid)'><img src='files/remove.png'></a></td>";
echo "</tr>";
}
} //Ending IF Condition
else
{
echo "<th><center>No records to display</center></th></tr>";
}
echo "</tbody></table></div>";


mysqli_close($con);

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
       <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
      </div>
      <div class="modal-body" id="rslt">
        <form action="" method="post">
  <form method="post" action="" onsubmit="return ValidateForm()" autocomplete="off">                  <div class="box-body">
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email Address</label>
                    <input type='email' name='email' class='form-control' required>                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Full Name</label>
                      <input type='text' name='name' class='form-control' required>                     
                    </div>     
                    <div class="form-group">
                      <label for="exampleInputPassword1">Select Group</label>
                                          
                                   
<?php
include 'web/connect.php';
 if(!$connection ) {
            die('Could not connect: ' . mysql_error());
            }
             $usern = $_SESSION['login_user'];
$sql1 = "select * from groups where user='".$usern."' and level=1;";

   $retval1 = mysql_query( $sql1, $connection );

                    echo '<select name="mygroup" class="form-control" required>'; // Open your drop down box
echo '<option value="" default>--- Select if applicable ----</option>';
// Loop through the query results, outputing the options one by one
while ($row1 = mysql_fetch_array($retval1)) {
  
   echo '<option value="'.$row1['grpname'].'">'.$row1['grpname'].'</option>';
}

echo '</select>';// Close your drop down box
?>
</div>  
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="submit1" value="submit" id="Submit" class="btn btn-primary"><i class="fa fa-send-o"></i>  Save contact</button>
                  </div>
                </form> 
        </form>
        <?php
        include 'web/connect.php';
        // Check connection


if(isset($_POST['submit1'])){
          $usern = $_SESSION['login_user'];
$varname = $_REQUEST['name'];
$vargrp = $_REQUEST['mygroup'];
$varemail = $_REQUEST['email'];
          if($varemail != NULL){
         

$sql = "INSERT INTO contacts (name, email, user, grp, time, level) VALUES ('".$varname."', '".$varemail."', '".$usern."', '".$vargrp."', (NOW() + INTERVAL '$tz' MINUTE), '1');";
   $retval = mysql_query( $sql, $connection );
   echo '<script language="javascript">';
echo 'alert("Contact Added Successfully")';
echo '</script>';
echo "<script>window.location.href = window.location.href;</script>";
}
else{
   echo '<script language="javascript">';
echo 'alert("Contact Addition Failed")';
echo '</script>';
}
}
else {
 
}
        ?>
</div>
   
      
      <div class="modal-footer">
       
       
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!----  EXCEL MODAL---->

<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Contact from Excel Sheet</h4>
      </div>
      <div class="modal-body" id="rslt">
        
  <form method="post" action="" enctype="multipart/form-data">                  <div class="box-body">
                   
                   
                    <div class="form-group">
                      <label for="exampleInputPassword1">Select File (xls format only)</label>
                      <input name='fileToUpload' type='file' class='form-control' required>                     
                    </div>     
                    <div class="form-group">
                      <label for="exampleInputPassword1">Select Group</label>
                                          
                                   
<?php
include 'web/connect.php';
 if(!$connection ) {
            die('Could not connect: ' . mysql_error());
            }
             $usern = $_SESSION['login_user'];
$sql1 = "select * from groups where user='".$usern."' and level=1;";

   $retval1 = mysql_query( $sql1, $connection );

                    echo '<select name="mygrp" class="form-control">'; // Open your drop down box
echo '<option value="" default>--- Select if applicable ----</option>';
// Loop through the query results, outputing the options one by one
while ($row1 = mysql_fetch_array($retval1)) {
  
   echo '<option value="'.$row1['grpname'].'">'.$row1['grpname'].'</option>';
}

echo '</select>';// Close your drop down box
?>
</div>  
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="submit" value="Upload" id="Submit" class="btn btn-primary"><i class="fa fa-send-o"></i>  Upload and save contacts</button>
                  </div>
                </form> 
  
        <?php


if(isset($_POST['submit']))
include 'uploadfile.php';
?>
</div>
   
      
      <div class="modal-footer">
       
       
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- EXCEL MODAL ENDS -->
  </body>
</html>