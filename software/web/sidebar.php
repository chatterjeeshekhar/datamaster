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
<?php
$acstat = $_SESSION['acstat'];
if($acstat == "D") {
echo '<li class="treeview active">
              <a href="appeal.php">
                <i class="fa fa-ban"></i> <span>Appeal Restriction</span> 
              </a>
            </li>';
}
else {}
?>            
<li class="treeview">
              <a href="home.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
              </a>
            </li>
             <li class="treeview">
              <a href="buy.php">
                <i class="fa fa-stack-overflow"></i> <span>Buy Database</span>
              </a>
            </li>
<li class="treeview">
              <a href="other.php">
                <i class="fa fa-search"></i> <span>Other Services</span>
              </a>
            </li>
 <li class="treeview">
              <a href="orders.php">
                <i class="fa fa-money"></i> <span>My Orders</span>
              </a>
            </li>
 <li class="treeview">
              <a href="bills.php">
                <i class="fa fa-suitcase"></i> <span>Transactions</span>
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
                <!--<small class="label pull-right bg-red">3</small>-->
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
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>