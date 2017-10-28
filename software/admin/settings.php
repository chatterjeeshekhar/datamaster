<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Main settings</title>
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
   <?php
$projectname = false;
$projectweb = false;
$supportemail = false;
$supportweb =  false;


if(isset($_SESSION['smsrate']))
$smsrate = $_SESSION['smsrate'];


if(isset($_SESSION['paysand']))
$paysand = $_SESSION['paysand'];


if(isset($_SESSION['projectname']))
$projectname = $_SESSION['projectname'];

if(isset($_SESSION['projectweb']))
$projectweb = $_SESSION['projectweb'];

if(isset($_SESSION['supportemail']))
$supportemail = $_SESSION['supportemail'];

if(isset($_SESSION['supportweb']))
$supportweb = $_SESSION['supportweb'];

if(isset($_SESSION['paypalemail']))
$paypalemail = $_SESSION['paypalemail'];

if(isset($_SESSION['extcode']))
$extcode = $_SESSION['extcode'];
?>
  <body class="hold-transition skin-blue sidebar-mini" onload="calculate()">
    <div class="wrapper">
<?php include 'web/header2.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include 'web/sidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          System Settings
            <small></small>
          </h1>
          
        </section>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "getbalance.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><font color=red>Caution</font>: All values should be accurate and verified, software may stop working if invalid values provided</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
   <form name="Form" method="post" action="" autocomplete="off">      
 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                
                
                  <li class="active"><a href="#main" data-toggle="tab"><i class="fa fa-cog"></i> System settings</a></li>
                   <li><a href="#pricing" data-toggle="tab"><i class="fa fa-briefcase"></i> Pricing and Branding</a></li>
 <li><a href="#smtp" data-toggle="tab"><i class="fa fa-server"></i> SMTP Server Settings</a></li>
<li><a href="#notification" data-toggle="tab"><i class="fa fa-eye"></i> Notification Settings</a></li>
<li><a href="#payment" data-toggle="tab"><i class="fa fa-money"></i> Payment Gateway</a></li>
                </ul>
                <div class="tab-content">

                  <div class="active tab-pane" id="main">
                      
                <div class="box-body">
                  
              
                         <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">License Key</label>
        <input type="text" name="mylicense" id="Name" value="<?php echo $_SESSION['softwarelicense']; ?>" class="form-control" disabled>
                    </div>
                   
                         <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Software Name</label>
        <input type="text" name="projectnam" id="Name" value="<?php echo $projectname; ?>" class="form-control" required>
                    </div>
                    <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Software Url</label>
    <input type="text" name="projectwe" id="Name" value="<?php echo $projectweb; ?>" class="form-control" required>
                    </div>
<div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Universal Alert</label>
        <input type="text" name="univalert" id="Name" value="<?php echo $_SESSION['univalert']; ?>" placeholder="Universal Alert Message" class="form-control">
                    </div>
                    
<div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">SMS API Key</label>
      <input type="text" name="smsapi" id="Name" value="<?php echo $_SESSION['smsapi']; ?>" class="form-control" required>
                    </div>
        
                
 </div><!-- /box body -->         
 </div><!-- /.tab-pane -->
                       <div class="tab-pane" id="pricing">
                         <div class="box-body">
<div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Per Email Rate (in INR)</label>
        <input type="text" name="smsrat" id="Name" value="<?php echo $smsrate; ?>" class="form-control" required>
                    </div>
                    <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Support website</label>
    <input type="text" name="supportwe" id="Name"value="<?php echo $supportweb; ?>" class="form-control" required>
                    </div>
 <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Support Email</label>
      <input type="text" name="supportemai" id="Name" maxlength="100" value="<?php echo $supportemail; ?>" class="form-control" required>
                    </div>
                         <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">PayPal Email</label>
      <input type="text" name="paypalemai" id="Name" maxlength="100" value="<?php echo $paypalemail; ?>" class="form-control" required>
                    </div>
                 <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">PayPal Mode</label>
<?php
if($paysand == "sandbox.paypal.com") {
echo '<select name="paysan" class="form-control" required>
<option value="">---Select one---</option>
<option value="sandbox.paypal.com" selected="selected">Demo Mode</option>
<option value="paypal.com">Live Mode</option></select>';
}
else if($paysand == "paypal.com") {
echo '<select name="paysan" class="form-control" required>
<option value="">---Select one---</option>
<option value="sandbox.paypal.com">Demo Mode</option>
<option value="paypal.com" selected="selected">Live Mode</option></select>';
}
else {
echo '<select name="paysan" class="form-control" required>
<option value="" selected="selected">---Select one---</option>
<option value="sandbox.paypal.com">Demo Mode</option>
<option value="paypal.com">Live Mode</option></select>';
}

     ?>
               </div>
                         <div class="col-xs-6 form-group">
                      <label for="exampleInputEmail1">Additional Source</label>
      <textarea name="extcod" id="Name" class="textarea" placeholder="Universal Source goes here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
<?php echo $extcode; ?>
</textarea>        
                    </div>
                 </div><!-- /.box-body -->
</div><!-- /.tab-pane -->

<!------SMTP---->
 <div class="tab-pane" id="smtp">
                 <div class="box-body">
                                <div class="clearfix"></div>
                <div class="form-group col-lg-12">
                    <label for="DeliveryServerSmtp_name">Name</label>                    <input data-title="Name" data-container="body" data-toggle="popover" data-content="The name of this server to make a distinction if having multiple servers with same hostname." class="form-control has-help-text" placeholder="Name" data-placement="top" opli="DeliveryServerSmtp[name]" id="DeliveryServerSmtp_name" type="text" maxlength="150" />                                    </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_hostname" class="required">Hostname <span class="required">*</span></label>                    <input data-title="Hostname" data-container="body" data-toggle="popover" data-content="The hostname of your SMTP server, usually something like smtp.domain.com." class="form-control has-help-text" placeholder="smtp.your-server.com" data-placement="top" opli="DeliveryServerSmtp[hostname]" id="DeliveryServerSmtp_hostname" type="text" maxlength="150" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_username">Username</label>                    <input data-title="Username" data-container="body" data-toggle="popover" data-content="The username of your SMTP server, usually something like you@domain.com." class="form-control has-help-text" placeholder="you@domain.com" data-placement="top" opli="DeliveryServerSmtp[username]" id="DeliveryServerSmtp_username" type="text" maxlength="150" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_password">Password</label>                    <input data-title="Password" data-container="body" data-toggle="popover" data-content="The password of your SMTP server, used in combination with your username to authenticate your request." class="form-control has-help-text" placeholder="your smtp account password" data-placement="top" value="" opli="DeliveryServerSmtp[password]" id="DeliveryServerSmtp_password" type="text" maxlength="150" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_port" class="required">Port <span class="required">*</span></label>                    <input data-title="Port" data-container="body" data-toggle="popover" data-content="The port of your SMTP server, usually this is 25, but 465 and 587 are also valid choices for some of the servers depending on the security protocol they are using. If unsure leave it to 25." class="form-control has-help-text" placeholder="Port" data-placement="top" opli="DeliveryServerSmtp[port]" id="DeliveryServerSmtp_port" type="text" maxlength="5" value="25" />                                    </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_protocol">Protocol</label>                    <select data-title="Protocol" data-container="body" data-toggle="popover" data-content="The security protocol used to access this server. If unsure, leave it blank or select TLS if blank does not work for you." class="form-control has-help-text" placeholder="Protocol" data-placement="top" opli="DeliveryServerSmtp[protocol]" id="DeliveryServerSmtp_protocol">
<option value="" selected="selected">Choose</option>
<option value="tls">TLS</option>
<option value="ssl">SSL</option>
<option value="starttls">STARTTLS</option>
</select>                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_timeout" class="required">Timeout <span class="required">*</span></label>                    <input data-title="Timeout" data-container="body" data-toggle="popover" data-content="The maximum number of seconds we should wait for the server to respond to our request. 30 seconds is a proper value." class="form-control has-help-text" placeholder="Timeout" data-placement="top" opli="DeliveryServerSmtp[timeout]" id="DeliveryServerSmtp_timeout" type="text" value="30" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_from_email" class="required">From email <span class="required">*</span></label>                    <input data-title="From email" data-container="body" data-toggle="popover" data-content="The default email address used in the FROM header when nothing is specified" class="form-control has-help-text" placeholder="you@domain.com" data-placement="top" opli="DeliveryServerSmtp[from_email]" id="DeliveryServerSmtp_from_email" type="text" maxlength="150" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_from_name">From name</label>                    <input data-title="From name" data-container="body" data-toggle="popover" data-content="The default name used in the FROM header, together with the FROM email when nothing is specified" class="form-control has-help-text" placeholder="From name" data-placement="top" opli="DeliveryServerSmtp[from_name]" id="DeliveryServerSmtp_from_name" type="text" maxlength="150" />                                    </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_hourly_quota">Hourly quota</label>                    <input data-title="Hourly quota" data-container="body" data-toggle="popover" data-content="In case there are limits that apply for sending with this server, you can set a hourly quota for it and it will only send in one hour as many emails as you set here. Set it to 0 in order to not apply any hourly limit." class="form-control has-help-text" placeholder="Hourly quota" data-placement="top" opli="DeliveryServerSmtp[hourly_quota]" id="DeliveryServerSmtp_hourly_quota" type="text" maxlength="11" value="0" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_probability">Probability</label>                    <select data-title="Probability" data-container="body" data-toggle="popover" data-content="When having multiple servers from where you send, the probability helps to choose one server more than another. This is useful if you are using servers with various quota limits. A lower probability means a lower sending rate using this server." class="form-control has-help-text" placeholder="Probability" data-placement="left" opli="DeliveryServerSmtp[probability]" id="DeliveryServerSmtp_probability">
<option value="">Choose</option>
<option value="5">5 %</option>
<option value="10">10 %</option>
<option value="15">15 %</option>
<option value="20">20 %</option>
<option value="25">25 %</option>
<option value="30">30 %</option>
<option value="35">35 %</option>
<option value="40">40 %</option>
<option value="45">45 %</option>
<option value="50">50 %</option>
<option value="55">55 %</option>
<option value="60">60 %</option>
<option value="65">65 %</option>
<option value="70">70 %</option>
<option value="75">75 %</option>
<option value="80">80 %</option>
<option value="85">85 %</option>
<option value="90">90 %</option>
<option value="95">95 %</option>
<option value="100" selected="selected">100 %</option>
</select>                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_bounce_server_id">Bounce server</label>                    <select data-title="Bounce server" data-container="body" data-toggle="popover" data-content="The server that will handle bounce emails for this SMTP server." class="form-control has-help-text" placeholder="Bounce server" data-placement="top" opli="DeliveryServerSmtp[bounce_server_id]" id="DeliveryServerSmtp_bounce_server_id">
<option value="" selected="selected">Choose</option>
</select>                                    </div> 
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_tracking_domain_id">Tracking domain</label>                    <select data-title="Tracking domain" data-container="body" data-toggle="popover" data-content="The domain that will be used for tracking purposes, must be a DNS CNAME of the master domain." class="form-control has-help-text" placeholder="Tracking domain" data-placement="top" opli="DeliveryServerSmtp[tracking_domain_id]" id="DeliveryServerSmtp_tracking_domain_id">
<option value="" selected="selected">Choose</option>
</select>                                    </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_use_for">Use for</label>                    <select data-title="Use for" data-container="body" data-toggle="popover" data-content="Whether this server can be used only for campaigns(and related sending), transactional emails, or all sending types" class="form-control has-help-text" placeholder="Use for" data-placement="top" opli="DeliveryServerSmtp[use_for]" id="DeliveryServerSmtp_use_for">
<option value="all" selected="selected">All</option>
<option value="campaigns">Campaigns</option>
<option value="transactional">Transactional emails</option>
</select>                                    </div>
                                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_signing_enabled">Signing enabled</label>                    <select data-title="Signing enabled" data-container="body" data-toggle="popover" data-content="Whether signing is enabled when sending emails through this delivery server" class="form-control has-help-text" placeholder="Signing enabled" data-placement="top" opli="DeliveryServerSmtp[signing_enabled]" id="DeliveryServerSmtp_signing_enabled">
<option value="yes" selected="selected">Yes</option>
<option value="no">No</option>
</select>                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_force_from">Force FROM</label>                    <select data-title="Force FROM" data-container="body" data-toggle="popover" data-content="When to force the FROM email address" class="form-control has-help-text" placeholder="Force FROM" data-placement="top" opli="DeliveryServerSmtp[force_from]" id="DeliveryServerSmtp_force_from">
<option value="never" selected="selected">Never</option>
<option value="always">Always</option>
<option value="when no valid signing domain">When no valid signing domain</option>
</select>                                    </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_reply_to_email">Reply-To email</label>                    <input data-title="Reply-To email" data-container="body" data-toggle="popover" data-content="The default email address used in the Reply-To header when nothing is specified" class="form-control has-help-text" placeholder="you@domain.com" data-placement="top" opli="DeliveryServerSmtp[reply_to_email]" id="DeliveryServerSmtp_reply_to_email" type="text" />                                    </div>
                <div class="form-group col-lg-3">
                    <label for="DeliveryServerSmtp_force_reply_to">Force Reply-To</label>                    <select data-title="Force Reply-To" data-container="body" data-toggle="popover" data-content="When to force the Reply-To email address" class="form-control has-help-text" placeholder="Force Reply-To" data-placement="top" opli="DeliveryServerSmtp[force_reply_to]" id="DeliveryServerSmtp_force_reply_to">
<option value="never" selected="selected">Never</option>
<option value="always">Always</option>
</select>                                    </div>

                 </div><!-- /.box-body -->
</div><!-- /.tab-pane -->
<!--------SMTP--->

<!------Notification---->
 <div class="tab-pane" id="notification">
                 <div class="box-body">
                             <h4><i class="fa fa-users"></i> Client Notifications</h4><hr />
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">Email on registration  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div>
                                 </div>    <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">Email on add credits  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div>                         </div>
<div class="form-group col-lg-3"><br>
  <label for="DeliveryServerSmtp_hostname" class="required">SMS on registration  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div></div>
<div class="form-group col-lg-3"><br>
  <label for="DeliveryServerSmtp_hostname" class="required">SMS on add credits  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div></div><div class="clearfix"><!-- --></div>
     <h4><i class="fa fa-user-md"></i>  Administrator Notifications</h4><hr />
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">Email on registration  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div>
                                 </div>    <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">Email on add credits  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div>                         </div>
<div class="form-group col-lg-3"><br>
  <label for="DeliveryServerSmtp_hostname" class="required">SMS on registration  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div></div>
<div class="form-group col-lg-3"><br>
  <label for="DeliveryServerSmtp_hostname" class="required">SMS on add credits  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div></div>
</div>

                 </div><!-- /.box-body -->

<!--------Notification--->
<!------Payment---->
 <div class="tab-pane" id="payment">
                 <div class="box-body">
                             <h4><i class="fa fa-credit-card"></i> Online Gateways</h4><hr />
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">PayPal Standard  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off" checked> Enabled
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off"> Disabled</label>
</div>
                                 </div>    <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">CCAvenue INR  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off"> Enabled
  </label>
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off" checked> Disabled</label>
</div>                         </div>
<div class="clearfix"><!-- --></div>
     <h4><i class="fa fa-university"></i>  Offline gateways</h4><hr />
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">Registered Cheque  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off"> Enabled
  </label>
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off" checked> Disabled</label>
</div>
                                 </div>    <div class="form-group col-lg-3"><br>
                    <label for="DeliveryServerSmtp_hostname" class="required">Bank Transfer  <span class="required"></span></label>                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="chkinsert" value="1" id="option1" autocomplete="off"> Enabled
  </label>
  <label class="btn btn-primary active">
    <input type="radio" name="chkinsert" value="0" id="option2" autocomplete="off" checked> Disabled</label>
</div>                         </div>
</div>
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>


                 </div><!-- /.box-body -->
</div><!-- /.tab-pane -->
<!--------Payment--->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
 <div class="box-body">
                  <div class="col-xs-6 form-group">
                    <input type="hidden" name="otherinfo" value="1">
                    <button type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary btn-lg"><i class="fa fa-gear"></i>  Update settings</button>
                  </div>
                </form> 


                
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
    <?php
$projectname = false;
$projectweb = false;
$supportemail = false;
$supportweb =  false;

if(isset($_POST['projectnam']))
$projectname = $_POST['projectnam'];

if(isset($_POST['projectwe']))
$projectweb = $_POST['projectwe'];

if(isset($_POST['supportemai']))
$supportemail = $_POST['supportemai'];

if(isset($_POST['supportwe']))
$supportweb = $_POST['supportwe'];

if(isset($_POST['paypalemai']))
$paypalemail = $_POST['paypalemai'];

if(isset($_POST['extcod']))
$extcode = $_POST['extcod'];

if(isset($_POST['otherinfo']))
$otherchk = $_POST['otherinfo'];

if(isset($_POST['smsrat']))
$smsrat = $_POST['smsrat'];

if(isset($_POST['smsapi']))
$smsapi = $_POST['smsapi'];

if(isset($_POST['univalert']))
$univalert = $_POST['univalert'];

if(isset($_POST['paysan']))
$paysan = $_POST['paysan'];

if($otherchk == 1)
{ 
include 'web/connect.php';
$extcode = str_replace('"','/"',$extcode);
$extcode = mysqli_real_escape_string($con, $extcode);
$univalert= str_replace('"','/"',$univalert);
$univalert = mysqli_real_escape_string($con, $univalert);
$projectname = str_replace('"','/"',$projectname);
$projectname = mysqli_real_escape_string($con, $projectname);
$sql ="update main set projectname='$projectname', weburl='$projectweb', supporturl='$supportweb', supportemail='$supportemail', paypal='$paypalemail', extcode='$extcode', smsrate='$smsrat', paysand='$paysan', smsapi='$smsapi', univalert='$univalert' where id=1";
    $retval = mysqli_query( $con, $sql );
echo "<script>window.location.href = window.location.href;</script>";
}
?>
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
   
  </body>

<script>

    function calculate() {
    var myBox1 = document.getElementById('box1').value; 
    var myBox2 = document.getElementById('box2').value;
    var result1 = document.getElementById('result1'); 
    var myResult = myBox1 * myBox2;
    result1.innerHTML = myResult;

}
 window.onload = calculate;
</script></div>
</html>
