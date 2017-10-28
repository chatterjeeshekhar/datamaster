<html>
<style>
body {
font-family: Arial;
}
</style>
<body>
<script language=JavaScript>

var message="";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
</body>
</html><?php
include 'session.php';
include 'web/connect.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
$u1 = $_REQUEST['u'];
$i1 = $_REQUEST['i'];
$userac = $_SESSION['login_user'];
echo $userac;
$mysqlstat = "SELECT * FROM emails where stat=1 and user='$userac' and ID='$i1'"; 
$result = mysqli_query($con, $mysqlstat);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$cntbody = str_replace('/"','"',$row['Content']);
echo $cntbody;
}
echo mysqli_error();
?>
