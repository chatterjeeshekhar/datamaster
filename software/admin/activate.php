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
            User documents verification manager
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Records are deleted every 24 months</h3>
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

$mysqlstat = "SELECT * FROM verify ORDER BY registerstamp DESC";
$result = mysqli_query($con, $mysqlstat);
$rows = mysqli_num_rows($result);

echo "<div class='table-responsive'><table id='example1' class='table table-bordered table-striped'><thead><tr>";
if($rows > 0)
{
echo "<th>User</th>
<th>Passport</th>
<th>Agreement</th>
<th>Address</th>
<th>EC</th>
<th>MC</th>
<th>Verify</th>
<th>Register</th></tr></thead><tbody>";

while($row = mysqli_fetch_array($result))
{
$dmid = $row['ID'];
$emid = $row['user'];
echo "<tr>";
echo "<td>" . $emid . "</td>";
//PASSPORT
echo "<td>";
if($row['passport'] == 0)
echo "Not uploaded";
if($row['passport'] == 1)
echo "<a href='/verify/docs/passport/$emid-passport.pdf' target='_new'>Click to view</a> <img onclick='deldoc1($dmid)' src='files/remove.png'> <button onclick='verf1($dmid)' class='btn btn-block btn-success btn-sm'>Verify</button>";
if($row['passport'] == 2)
echo "<a href='/verify/docs/passport/$emid-passport.pdf' target='_new'>Click to view</a> <img onclick='deldoc1($dmid)' src='files/remove.png'>  <button onclick='unverf1($dmid)' class='btn btn-block btn-danger btn-sm'>Unverify</button>";
echo "</td>";
//AGREEMENT
echo "<td>";
if($row['agreement'] == 0)
echo "Not uploaded";
if($row['agreement'] == 1)
echo "<a href='/verify/docs/agreement/$emid-agreement.pdf' target='_new'>Click to view</a> <img onclick='deldoc2($dmid)' src='files/remove.png'>  <button onclick='verf2($dmid)' class='btn btn-block btn-success btn-sm'>Verify</button>";
if($row['agreement'] == 2)
echo "<a href='/verify/docs/agreement/$emid-agreement.pdf' target='_new'>Click to view</a> <img onclick='deldoc2($dmid)' src='files/remove.png'>  <button onclick='unverf2($dmid)' class='btn btn-block btn-danger btn-sm'>Unverify</button>";
echo "</td>";
//ADDRESS
echo "<td>";
if($row['address'] == 0)
echo "Not uploaded";
if($row['address'] == 1)
echo "<a href='/verify/docs/address/$emid-address.pdf' target='_new'>Click to view</a> <img onclick='deldoc3($dmid)' src='files/remove.png'>  <button onclick='verf3($dmid)' class='btn btn-block btn-success btn-sm'>Verify</button>";
if($row['address'] == 2)
echo "<a href='/verify/docs/address/$emid-address.pdf' target='_new'>Click to view</a> <img onclick='deldoc3($dmid)' src='files/remove.png'>  <button onclick='unverf3($dmid)' class='btn btn-block btn-danger btn-sm'>Unverify</button>";
echo "</td>";

echo "<td>";
if($row['econf']==1)
echo "<img onclick='econf0($dmid)' src='files/remove.png'>";
if($row['econf']==0)
echo "<img onclick='econf1($dmid)' src='files/tick.png'>";
echo "</td>";
echo "<td>";
if($row['mconf']==1)
echo "<img onclick='mconf0($dmid)' src='files/remove.png'>";
if($row['mconf']==0)
echo "<img onclick='mconf1($dmid)' src='files/tick.png'>";
echo "</td>";
echo "<td>" . $row['verifystamp'] . "</td>";
echo "<td>" . $row['registerstamp'] . "</td>";
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
        $("#example2").DataTable();
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
 <script type="text/javascript">
function verf1(str) {
   if (confirm('Mark this document as verified?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=ver&r=passport&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function unverf1(str) {
   if (confirm('Mark this document as NOT verified?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=unver&r=passport&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function verf2(str) {
   if (confirm('Mark this document as verified?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=ver&r=agreement&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function unverf2(str) {
   if (confirm('Mark this document as NOT verified?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=unver&r=agreement&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function verf3(str) {
   if (confirm('Mark this document as verified?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=ver&r=address&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function unverf3(str) {
   if (confirm('Mark this document as NOT verified?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=unver&r=address&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function deldoc1(str) {
   if (confirm('Ask user to re-upload this document?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=delete&r=passport&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function deldoc2(str) {
   if (confirm('Ask user to re-upload this document?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=delete&r=agreement&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function deldoc3(str) {
   if (confirm('Ask user to re-upload this document?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=delete&r=address&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function econf0(str) {
   if (confirm('Mark email UN-VERIFIED?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=e0&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function econf1(str) {
   if (confirm('Mark email VERIFIED') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=e1&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function mconf0(str) {
   if (confirm('Mark mobile UN-VERIFIED?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=m0&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}

function mconf1(str) {
   if (confirm('Mark mobile VERIFIED?') == true) {
 $("#loaderIcon").show();
jQuery.ajax({
url: "useract.php",
data:'q=m1&str='+str,
type: "POST",
success:function(data){
location.reload();
$("#loaderIcon").hide();
},
error:function (){}
});
}
}
</script>
  </body>
</html>
