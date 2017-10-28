<?php include 'session.php';
debug_backtrace() || die ("Direct access not permitted");
?>
<?php echo $_SESSION['extcode']; ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><?php
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
else {
echo '<span style="float:left;background-color:transparent;background-image:none;padding:15px 15px;vertical-align:middle;font-size:14px;color:white;font-family:Arial;font-weight:bold;background-color:#242424;">'.$alrt.'</span>'; }
$acstat = $_SESSION['acstat'];
if($acstat == "D"){
echo '<span style="float:left;background-color:transparent;background-image:none;padding:15px 15px;vertical-align:middle;font-size:14px;color:white;font-family:Arial;font-weight:bold;background-color:#5B03AD;"><i class="fa fa-lock"></i> <a href="appeal.php" style="color:white">Restricted Account</a></span>'; }
else {}
?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
          
              <!-- Notifications: style can be found in dropdown.less -->
            <!--    <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php include 'web/getimg.php'; ?>" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
<li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                
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
                <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                
                    <ul class="menu">
                      <li><
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>-->
              <!-- Tasks: style can be found in dropdown.less -->
            
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
        </nav>
      </header>

