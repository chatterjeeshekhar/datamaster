<?php
include('session.php');
?>
<form class="form-labels-on-top" name="Form" method="post" action="" onsubmit="return ValidateForm()" autocomplete="off">

            <div class="form-title-row">
                <h1>Self Recharge Service</h1>
            </div>

<?php

$users = false;
$addcred = false;

$users = $_SESSION['login_user'];

if(isset($_POST['addcred']))
$addcred = $_POST['addcred'];

if(isset($_POST['otherinfo']))
$otherchk = $_POST['otherinfo'];

if($otherchk == 1)
{ 
include 'web/connect.php';
$sql ="update boss set balance=balance+'$addcred' where username='$users'";
    $retval = mysql_query( $sql, $connection );

$payment_amount = $addcred * $_SESSION['smsrate'];
$payment_status = "Complete";
$transid1 = "Transfer from admin - ".rand(100000000, 9999999999);
$sql2 = "INSERT INTO bills (username, credits, amount, transid, status, ip, stamp) VALUES ('$users', '$addcred', '$payment_amount', '$transid1', '$payment_status', 'System', (NOW() + INTERVAL '$tz' MINUTE));";

   $retval2 = mysql_query( $sql2, $connection );

echo mysql_error();

echo "<font color='green' face='Arial'>Recharge Successful</font>";

}
else
{ }

?>
            <div class="form-row">
                <label>
                    <span>Username</span>
<?php 
$limita = (!empty($_SESSION['login_user']) ? $_SESSION['login_user'] : ""); 
echo "<input type='text' name='users' style='width:250px' class='text-box' value='$limita' disabled='disabled'>"?>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Current Balance</span>
                    <?php 
$limita1 = (!empty($_SESSION['user_balance']) ? $_SESSION['user_balance'] : ""); 
echo "<input type='text' style='width:250px' class='text-box' value='$limita1' disabled='disabled'>"?>

                </label>
            </div>

<div class="form-row">
                <label>
                    <span>Recharge Credits</span>
                    <input type="number"  name="addcred" onChange="calc()" style="width:250px" class="text-box" required=""  autocomplete="off"  onChange="calc()" autofocus>
                </label>
            </div>

<input type="hidden" name="otherinfo" value="1">
<div class="form-row">
                <button type="submit" name="Submit" value="Continue" class="btn" value="submit"/>Continue</button>
            </div>

</form>

