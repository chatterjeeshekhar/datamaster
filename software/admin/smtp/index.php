<?php
include('SMTPconfig.php');
include('SMTPclass.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['sub'];
$body = $_POST['message'];
$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
$SMTPChat = $SMTPMail->SendMail();
}
?>
<form method="post" action="">
To:<input type="text" name="to" /><br>
From :<input type='text' name="from" /><br>
Subject :<input type='text' name="sub" /><br>
Message :<textarea name="message"></textarea><br>
<input type="submit" value=" Send " />
</form>