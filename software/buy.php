<?php
include 'session.php';
setlocale(LC_MONETARY,"en_IN");
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css">

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
            Order Database
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">Buy Database</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
<?php
if($_REQUEST['error'] == 1) {
echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Transaction Failure!</h4>
              </div>';
}
if($_REQUEST['error'] == 2) {
echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> This Database was already purchased before!</h4>
              </div>';
}
?>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Every Database is auto-updated every 14 days using automated cron jobs.</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

<?php
include 'web/connect.php';
$xx1 = mysqli_num_rows(mysqli_query($con, "select * from category ORDER BY name"));
for ($x = 1; $x <= $xx1; $x++)
{
$cad = mysqli_fetch_array(mysqli_query($con, "select * from category where stat=1 and id=".$x));
$cadname =  $cad['name'];
if($cadname != NULL) {

echo '<div class="box box-default collapsed-box"><div class="box-header with-border">
              <h3 class="box-title">';
//title
echo $cadname;
//title


echo '</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div><div class="box-body">';

echo "<div class='table-responsive'><table id='example1' class='table table-bordered table-striped'><thead><tr>";
//body

$res = mysqli_query($con, "select * from dblist where stat=1 and cat=".$x." ORDER BY name ASC");
if(mysqli_num_rows($res) > 0)
{
echo "<th>ID</th>
<th>Name</th>
<th>Total Mobile</th>
<th>Total Email</th><th>Total Records</th><th>Price</th><th>Sample</th><th>Buy Now</th>";
//echo "<th>Customized</th>";
echo "</tr></thead><tbody>";
while($row = mysqli_fetch_array($res))
{
$itm = $row['itemcode'];
$nme = $row['name'];
echo "<tr>";
echo "<td>" . $itm . "</td>";
echo "<td>" . $nme . "</td>";
echo "<td>" . number_format($row['mobile']) . "</td>";
echo "<td>" . number_format($row['email']) . "</td>";
echo "<td>" . number_format($row['other']) . "</td>";
echo "<td>" . money_format("%i", $row['price']) . "</td>";
echo '<td><button onclick="mysample('."'".$nme."'".')" class="btn btn-danger btn-sm"><i class="fa fa-download"></i> Download</button></td>';
echo "<td><a href='process.php?itemno=$itm' class='btn btn-success btn-sm'><i class='fa fa-shopping-cart'></i> Checkout</a></td>";
//echo "<td><span class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i> Request</span></td>";
echo "</tr>";
}
echo "</tbody>";
} //Ending IF Condition
else
{
echo "<th><center>No records to display</center></th></tr></thead>";
}
echo "</table>";
echo  '</div></div><br>';
//body
}
else {}


}
?>                 


<script>
function mysample(id) {
BootstrapDialog.alert("Sample for "+id+" Database not available. Check again later!");
}
</script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>

    <script src="../../dist/js/demo.js"></script


    <!-- page script -->
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
