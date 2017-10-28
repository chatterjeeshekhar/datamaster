<?php include 'session.php'; ?> <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php include 'web/getimg.php'; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['userfname']; echo " "; echo $_SESSION['userlname'];
// echo " [Username: "; echo $_SESSION['login_user']; echo "]"; 
?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="https://www.google.com/search" target="_new" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Google Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <li class="treeview">
              <a href="home.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
              </a>
              <!--<ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>-->
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-envelope-o"></i>
                <span>My Campaigns</span>
                <i class="fa fa-angle-left pull-right"></i>
                              </a>
              <ul class="treeview-menu">
                <li><a href="compose.php"><i class="fa fa-bullhorn"></i> New Campaign</a></li>
                <li><a href="reports.php"><i class="fa fa-bicycle"></i> Delivery Reports</a></li>
<li><a href="signature.php"><i class="fa fa-pencil"></i> Email Signature</a></li>
             
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>My Contacts</span>
                <i class="fa fa-angle-left pull-right"></i>
                              </a>
              <ul class="treeview-menu">
                <li><a href="contacts.php"><i class="fa fa-list"></i> Contacts List</a></li>
                <li><a href="group.php"><i class="fa fa-group"></i> My Groups</a></li>
              <!-- <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-cubes"></i>
                <span>Admin Tools</span>
                <i class="fa fa-angle-left pull-right"></i>
                              </a>
              <ul class="treeview-menu">
                <li><a href="settings.php"><i class="fa fa-gear"></i> Main Settings</a></li>
                <li><a href="#"><i class="fa fa-users"></i> User Accounts  <i class="fa fa-angle-left pull-right"></i></a>
 <ul class="treeview-menu">
                <li><a href="activate.php"><i class="fa fa-unlock"></i> User activation</a></li>
<li><a href="listallusers.php"><i class="fa fa-list"></i> List users</a></li>
                <li><a href="createuser.php"><i class="fa fa-plus"></i> Create new</a></li>
                <li><a href="addfunds.php"><i class="fa fa-money"></i> Add funds</a></li>
                <li><a href="suspend.php"><i class="fa fa-unlock"></i> Suspend/Activate</a></li>
                <li><a href="modifyuser.php"><i class="fa fa-male"></i> Change username</a></li>
              </ul>
                </li>
                <li><a href="#"><i class="fa fa-info"></i> System Logs  <i class="fa fa-angle-left pull-right"></i></a>
 <ul class="treeview-menu">
                <li><a href="rechargelog.php"><i class="fa fa-credit-card"></i> Recharge</a></li>
                <li><a href="lastlogin.php"><i class="fa fa-paw"></i> Last login</a></li>
                <li><a href="resetpasslog.php"><i class="fa fa-key"></i> Reset password</a></li>
              </ul>
                </li>
                <li><a href="sentemails.php"><i class="fa fa-location-arrow"></i> Outgoing Emails </a>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-signal"></i> <span>Billing</span>  <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu"><li>
              <a href="bills.php">
                <i class="fa fa-suitcase"></i> <span>My Transactions</span>
                <!--<small class="label pull-right bg-red">3</small>-->
              </a>
            </li>
            <li>
              <a href="recharge.php">
                <i class="fa fa-refresh"></i> <span>Self Recharge</span>
                <!--<small class="label pull-right bg-red">3</small>-->
              </a>
            </li>
          </ul></li>
 <li class="treeview">
              <a href="apidoc.php">
                <i class="fa fa-stack-overflow"></i> <span>Developer API</span>
              </a>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Guide</span>
                <i class="fa fa-angle-left pull-right"></i>
                              </a>
              <ul class="treeview-menu">
                <li><a href="about.php"><i class="fa fa-info"></i> About project</a></li>
                <li><a href="terms.php"><i class="fa fa-check-square-o"></i> Terms of use</a></li>
                <li><a href="policy.php"><i class="fa fa-puzzle-piece"></i> Privacy policy</a></li>
<li><a href="contact.php"><i class="fa fa-feed"></i> Software Feedback</a></li>
               <li>
              <a target="_new" href="<?php echo $_SESSION['supportweb']; ?>">
                <i class="fa fa-support"></i> <span>Support Center</span>
              </a>
            </li>
</ul>
            </li>
                <li>
              <a href="logout.php">
                <i class="fa fa-sign-out"></i> <span>Sign out</span>
                <!--<small class="label pull-right bg-red">3</small>-->
              </a>
            </li>
            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li>
            <li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="../calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li class="treeview">
              <a href="mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="mailbox.html">Inbox <span class="label label-primary pull-right">13</span></a></li>
                <li><a href="compose.html">Compose</a></li>
                <li><a href="read-mail.html">Read</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>-->
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>