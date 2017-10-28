<?php
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
          <h1>
            Comprehensive Data
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
  if (confirm('Delete this record? This cannot be undone') == true) {
 $("#divLoading").show();
jQuery.ajax({
url: "add-item.php",
data: "ac=1&q="+str,
type: "POST",
success:function(data){
location.reload();
$("#divLoading").hide();
},
error:function (){}
});
}
  }
</script>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Delivery Reports</h3>
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

$mysqlstat = "SELECT * FROM emails where user='$userac' and stat=1 ORDER BY ID DESC"; 
$result = mysqli_query($con, $mysqlstat);
$rows = mysqli_num_rows($result);

echo "<div class='table-responsive'><table id='example1' class='table table-bordered table-striped'><thead><tr>";
if($rows > 0)
{
echo "<th>ID</th>
<th>Receiver's Email</th>
<th>Sender's Email</th>
<th>CC</th>
<th>BCC</th>
<th>Subject</th>
<th>Message</th>
<th>Delete</th>
</tr></thead><tbody>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
  echo "<td>";
$recv = explode(',',$row['Receiver']);
$cntv = count($recv);
for ($i=0; $i<$cntv; $i++) {
  echo $recv[$i]."<br>";
} 
$emid = $row['ID'];
  echo "</td>";
//echo "<td>" . $row['CC'] . "</td>";
//echo "<td>" . $row['BCC'] . "</td>";
echo "<td>" . $row['Sender'] . "</td>";
if ($row['CC'] != "") {
    echo "<td><img src='files/tick.png'></td>";
}
else {
  echo "<td><img src='files/remove.png'></td>";
}
if ($row['BCC'] != "") {
    echo "<td><img src='files/tick.png'></td>";
}
else {
  echo "<td><img src='files/remove.png'></td>";
}
//echo "<td>" . $row['Name'] . "</td>";
//echo "<td>" . $row['Replyto'] . "</td>";
echo "<td>" . $row['Subject'] . "</td>";
$cntbody = str_replace('/"','"',$row['Content']);
//echo "<td>" . $cntbody . "</td>";
echo "<td>" . "<button type='button' class='btn btn-primary' onclick='getFunction($emid)' data-toggle='modal' data-target='#myModal'>Click to view ($emid)</button>" . "</td>";
echo "<td>";

  if($row['stat'] == 1){
  echo "<a onclick='removeFunction($emid)'><img src='files/remove.png'></a>";
  }
  else
  {
  }
  echo "</td>";
echo "</tr>";
}
echo "</tbody>";
} //Ending IF Condition
else
{
echo "<th><center>No records to display</center></th></tr></thead>";
}
echo "</table></div>";

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

    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Message Content</h4>
      </div>
      <div class="modal-body" id="rslt">
</div>
        <script>

  function getFunction(str) {
   
  if (str.length == 0) { 
          document.getElementById("rslt").innerHTML = "Error";
          return;
      } else {
          document.getElementById("rslt").innerHTML="<?php 
$phpvar='"+str+"';
$ppwp = $phpvar;
$urlstr = $_SESSION['projectweb']."admin/getcont.php?i=".$ppwp;
echo "<div id='divLoading'><center><img src='../files/loading.gif' alt='' /><br>Loading..</div><div id='divFrameHolder' style='display:none'><iframe src='$urlstr' frameborder='0' width='100%' scrolling='auto' onload='hideLoading()' sandbox></iframe></div>";
echo "";
   ?>";
           };
          
 
        }
        
</script>
      <script type="text/javascript"> 
       function hideLoading() { 
            document.getElementById('divLoading').style.display = "none"; 
            document.getElementById('divFrameHolder').style.display = "block"; 
        } 
    </script> 
    <div class='modal-footer'><button type='button' class='btn' href='$urlstr' target='_new'>Open In New Tab</button>
 <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
      </div>
       
    </div>
  </div>
</div>
    <script>
      $(function () {
        $("#example2").DataTable();
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
