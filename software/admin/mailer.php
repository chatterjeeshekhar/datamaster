<?php 
include('session.php');
echo "";
$curbal = $_SESSION['user_balance'];
if($curbal > 0) {
if(!isset($_POST['Submit'])) {
@header('Location: home.php');
} 
else {
    
    $email_to = $_POST['toemail'];    // Receiver's email
$email_to = preg_replace('#\s+#',',',trim($email_to));
        $email_sender = $_POST['senderemail'];  // Sender Email
$sender_name = $_POST['sendername']; // Sender Name
    $Email = $_POST['replyto']; // Reply-to Email
$email_subject = $_POST['msubject']; // Email Subject
    $thankyou = "thanks.html";
$email_message = $_POST['Comment']; // Message Body
$email_content = $_POST['Comment'];
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR']; // Client IP Address
$ccmail = $_POST['ccemail']; // CC Email IDs
$ccmail = preg_replace('#\s+#',',',trim($ccmail));
$bccmail = $_POST['bccemail']; // BCC Email IDs
$bccmail = preg_replace('#\s+#',',',trim($bccmail));

if(isset($_POST['Resume']))
$filevar = $_POST['Resume'];
$exceedchk = 0;

if ($filevar == NULL)
{
$filechk = "Y";
}
else {
$filechk = "N";
}
 if($email_to != NULL)
{
$tags = explode(',' , $email_to);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
} 
 if($ccmail != NULL)
{
$tags = explode(',' , $ccmail);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
}  
 if($bccmail != NULL)
{
$tags = explode(',' , $bccmail);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
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
            " filename=\"{$name}\"\n" .
            "Content-Transfer-Encoding: base64\n\n" .
         $data . "\n\n";
      }
   }
            
if($exceedchk < $curbal)
{
$headers = "From: {$sender_name} <{$email_sender}>"."\r\n";   // Mail will be sent from your Admin ID

if ( "" != $ccmail || "" != $bccmail)
{

if ( "" != $ccmail)
{
$headers .= "CC: ".$ccmail."\r\n";
}

if ( "" != $bccmail)
{
$headers .= "BCC: ".$bccmail."\r\n";
}

}
$headers .= 'Reply-To: '.$Email."\r\n" . // Reply to Sender Email          
'X-Mailer: PHP/' . phpversion();
$fromserver = "-f".$email_sender;
// headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
@mail($email_to, $email_subject, $email_message, $headers, $fromserver);

echo '<title>Email Sent Successfully</title><meta name="viewport" content="width=device-width, initial-scale=1"><center><h3><Br><font color="green" face="Arial">Your Email Sent Successfully</font></h3><a href="reports.php"><img src="view-report-button.gif"></a></center>';

include 'web/connect.php';
// Check connection
if(! $connection ) {
      die('Could not connect: ' . mysql_error());
   }

$userac = $_SESSION['login_user'];
$email_content = str_replace('"','/"',$email_content);
$email_content = mysql_real_escape_string($email_content);
$sql = "INSERT INTO emails  (Receiver, Sender, Name, Replyto, Subject, Content, CC, BCC, Files, IP, user, Stamp) VALUES ('$email_to', '$email_sender', '$sender_name', '$Email', '$email_subject', '$email_content', '$ccmail', '$bccmail', '$filechk', '$ipadd', '$userac', (NOW() + INTERVAL '$tz' MINUTE));";


   $retval = mysql_query( $sql, $connection );

 if(! $retval ) {
      die('Could not enter data: ' . mysql_error());

   }
   else
   {
    
   }
$sql2 ="update boss set total=total+'$exceedchk', balance=balance-'$exceedchk' where username='$userac';";
    $retval2 = mysql_query( $sql2, $connection );


mysql_close($connection);

//FINISH ADDING TO DATABASE
}
else {
  echo "<font color='red' face='Arial'><center><h2>Not enough Balance</h2></center></font>";
}
}
}

?>