<?php
if ($_POST['submit'] == 1)
{
include 'web/connect.php';
// Check connection
if(! $connection ) {
      die('Could not connect: ' . mysql_error());
   }


$sql = "INSERT INTO login (username, password) VALUES ('$userna', '$passwo')";

   $retval = mysql_query( $sql, $connection );

 if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
if($retval)
{
echo '<center><h3><font color="green">Account created!</font></h3></center>';
}
   else
   {
    
   }

mysql_close($connection);

}
if($_POST['submit'] == NULL)
{

}
else
{
}
?>