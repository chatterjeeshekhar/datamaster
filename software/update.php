<?php include 'session.php'; ?>
<?php
include 'session.php';
$sub = isset($_POST['sub']) ? $_POST['sub'] : '';
$userac = $_SESSION['login_user'];
$otherchk = $_POST['otherinfo'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$useremail = $_POST['useremail'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$city = $_POST['city'];
$country= $_POST['country'];

if($otherchk == 1)
{ 
include 'web/connect.php';
$sql ="update login set fname='$fname', lname='$lname', email='$useremail', address='$address', city='$city', country='$country', tel='$tel' where user='$userac';";
    $retval = mysqli_query( $con, $sql );
if ($sub == 1) {$target_dir = "files/pp/";
$filename = $_FILES["fileToUpload"]["name"];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$finalname = $_SESSION['login_user'] . "." . $ext;
$target_file = $target_dir . basename($finalname);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["fileToUpload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.")</script>';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
  //  echo '<script>alert("Sorry, file already exists.")</script>';
    // $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<script>alert("Sorry, your file is too large.")</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
    } else {
        echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
    }
}


}
echo "<script>window.location.href = window.location.href;</script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $_SESSION['projectname']; ?> | User Settings</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<?php include 'web/header2.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include 'web/sidebar.php'; ?>
 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Settings
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Settings</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php include 'web/getimg.php'; ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $_SESSION['userfname']; echo " "; echo $_SESSION['userlname']; ?></h3>
                 <!-- <p class="text-muted text-center">Software Engineer</p>-->

                 

                  <a href="logout.php" class="btn btn-primary btn-block"><b>Log Out</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
            
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                
                
                  <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                   <li><a href="#pass" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                  
                 
                  <div class="active tab-pane" id="settings">
        
                      <form class="form-horizontal" name="Form" method="post" action="" onsubmit="return ValidateForm()" enctype="multipart/form-data">
<input type="hidden" name="otherinfo" value="1">
<input type="hidden" name="sub" value="1">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                          <input  type="text" name="fname" id="Name" value="<?php echo $_SESSION['userfname']; ?>"  class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                          <input  type="text" name="lname" id="Name" value="<?php echo $_SESSION['userlname']; ?>"  class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="useremail" id="Email" value="<?php echo $_SESSION['useremail']; ?>" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="number" name="tel" id="Name" maxlength="80" value="<?php echo $_SESSION['user_tel']; ?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience"  name="address" id="Name" maxlength="100" value=""  placeholder="Address"><?php echo $_SESSION['user_address']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" name="city" id="Name" maxlength="100" value="<?php echo $_SESSION['user_city']; ?>" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                          <input  type="text" name="country" id="Phone" maxlength="80" value="<?php echo $_SESSION['user_country']; ?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-10">
                          <input  name="fileToUpload" id="dp" type="file" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required="required"> I agree to the <a href="terms.php">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit" value="submit" class="btn btn-danger btn-lg">Update Account Details</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                       <div class="tab-pane" id="pass">
                    <!-- The timeline -->
                   <form class="form-horizontal" name="Form" method="post" action="" onsubmit="return ValidateForm()">
                      <?php
if($_POST['cngpass'] == 1)
{
$curpas = $_POST['curpas'];
$newpas = $_POST['newpas'];
$newpas1 = $_POST['newpas1'];
if ($newpas == $newpas1)
{
include 'web/connect.php';
$userac = $_SESSION['login_user'];
$query = mysqli_query($con,"update login set password=md5('$newpas') where user='$userac' and password=md5('$curpas')");
$rows = mysqli_affected_rows($con);

if($rows > 0)
{ echo '<script>alert("Password successfully changed");
window.location.href = "logout.php";</script>'; 

}
else { 
echo '<script>alert("Incorrect current password")</script>'; }
}

else
echo '<script>alert("Passwords do not match")</script>';
 }

?>
<!-- Ends Change Password Script -->
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Current</label>
                        <div class="col-sm-10">
                          <input type="password" name="curpas" class="form-control" id="inputName" placeholder="Current Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">New</label>
                        <div class="col-sm-10">
                          <input type="password" name="newpas" id="pass1" class="form-control" id="inputEmail" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Repeat</label>
                        <div class="col-sm-10">
                          <input type="password" name="newpas1" id="pass2"  onKeyPress="myFunction()" onKeyUp="myFunction()" placeholder="Repeat New Password" class="form-control" id="inputEmail">
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit2" class="btn btn-danger btn-lg">Change Password</button>
                        </div>
                      </div>
                      <input type="hidden" name="cngpass" value="1">
                      </form>
                     
                   
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
  </div><!-- /.row -->

        </section><!-- /.content -->
    
<script>
function myFunction() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
       document.getElementById("pass1").style.borderColor = "#47DE33";
        document.getElementById("pass2").style.borderColor = "#47DE33";
    }
    return ok;
}
</script>
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
<?php include 'web/footer2.php'; ?>

  </body>
</html>