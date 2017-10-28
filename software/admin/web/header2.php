<?php include 'session.php'; ?>
<?php echo $_SESSION['extcode']; ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
<?php
$kgp = explode(' ',$_SESSION['projectname']);

echo "<b>".substr($kgp[0], 0, 1)."</b>".substr($kgp[1], 0, 1)."</span>";
?>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><?php echo $_SESSION['projectname']; ?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a> 
<?php
$alrt = $_SESSION['univalert'];
if($alrt == NULL){}
else
echo '<span style="float:left;background-color:transparent;background-image:none;padding:15px 15px;vertical-align:middle;font-size:14px;color:white;font-family:Arial;font-weight:bold;background-color:#242424;">'.$alrt.'</span>';
?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
                  
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">2</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 2 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                           Create API System
                            <small class="pull-right">98%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 98%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">98% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
<li><!-- Task item -->
                        <a href="#">
                          <h3>
                           Forgot Password OTP System
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">
40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
               <li class="dropdown tasks-menu">
                <a class="active">
                  Administrator 
                  <span class="hidden-xs"></span>
                </a>
              
              </li>

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php include 'web/getimg.php'; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['userfname']; echo " "; echo $_SESSION['userlname'];
// echo " [Username: "; echo $_SESSION['login_user']; echo "]"; 
?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php include 'web/getimg.php'; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['userfname']; echo " "; echo $_SESSION['userlname'];
// echo " [Username: "; echo $_SESSION['login_user']; echo "]"; 
?>
                     <!-- <small>Member since Nov. 2012</small>-->
                    </p>
                  </li>
                  <!-- Menu Body -->
                <li class="user-body">
                                        <div class="row">
                                            <div class="col-md-6 pull-left">
                                                <a href="#">Balance</a>
                                                <label id="lblPromotionalBalance"><?php echo $_SESSION['user_balance']; ?></label>
                                            </div>
                                            <div class="col-md-6 pull-right">
                                                <a href="#">Total Sent</a>
                                                <label id="lblTransactionalBalance"><?php echo $_SESSION['user_total']; ?></label>

                                            </div>
                                        </div>

                                    </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="update.php" class="btn btn-default btn-flat"><i class="fa fa-gears"></i> My Settings</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav><!------------------------>
<?php
if($_SESSION['user_balance'] <101)
{
echo '<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-warning"></i> Alert! Balance Critically low <i class="fa fa-battery-quarter"></i></h4>
Recharge your account immediately to avoid campaign failures <!--<a href="recharge.php" class="btn btn-block btn-primary">Recharge Now</a>-->
</div>';
}
else {
}
?>
<!------------------------>
      </header>

