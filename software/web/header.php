<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $_SESSION['projectname']; ?></title>
<link rel="shortcut icon" type="image/ico" href="/img/favicon.png"/>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-labels-on-top.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
CKEDITOR.env.isCompatible = true;
                CKEDITOR.replace( 'editor1' );
            </script>

</head>
  <?php echo $_SESSION['extcode']; ?>
	<header class="header1">
		<h1><?php echo $_SESSION['projectname']; ?></h1>
    </header>
<header class="header2">
		<h1><?php echo $_SESSION['userfname']; echo " "; echo $_SESSION['userlname'];
// echo " [Username: "; echo $_SESSION['login_user']; echo "]"; 
?></h1>
    </header>
<header class="header3">
		<h1>Balance: <?php echo $_SESSION['user_balance']; echo " | Sent: "; echo $_SESSION['user_total']; ?></h1>
    </header>

<style>
.toppagehead {
 display: inline-block;
    box-sizing: border-box;
    color: #4C565E;
    font-size: 24px;
    padding: 0 0 12px 0;
    margin: 0;
    border-bottom: 2px solid #6CAEE0;
}
</style>

 <link rel="stylesheet" href="menu/styles.css">
   <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="menu/script.js"></script>

<div id='cssmenu'>
<ul>
   <li><a href='home.php'><span>Home</span></a></li>
   <li class='active'><a href='profile.php'><span>New Campaign</span></a>
     
         <li class=''><a href='reports.php'><span>Delivery Receipts</span></a>
            <!--<ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>-->
         </li>
         <li class='has-sub'><a><span>Billing</span></a>
            <ul>
               <li><a href='recharge.php'><span>Recharge</span></a></li>
               <li class='last'><a href='bills.php'><span>Transactions</span></a></li>
            </ul>
         </li>
     
   </li>
<li><a href='update.php'><span>Update Profile</span></a></li>
   <li><a href='about.php'><span>About</span></a></li>
<li><a href="<?php echo $_SESSION['supportweb']; ?>" target="_blank"><span>Support</span></a></li>
<li><a href='contact.php'><span>Contact</span></a></li>
<li class='last'><a href='logout.php'><span>Log Out</span></a></li>
<!--<li><a href="recharge.php"><img style="" src="files/add_funds_transp.png"></a></li>-->
   

</ul>
</div>
<?php

if($_SESSION['user_balance'] < 100) {
echo '<header class="header4"><h1>Your balance is less than 100 emails &nbsp;&nbsp;<a href="recharge.php">Recharge Now</a></h1></header>';
}
else
{ }
?>

    <br>