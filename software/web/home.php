<?php
include 'session.php';
$sub = isset($_POST['sub']) ? $_POST['sub'] : '';
if ($sub == 1) {$target_dir = "files/pp/";
$filename = $_FILES["fileToUpload"]["name"];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$finalname = $_SESSION['login_user'] . "." . $ext;
$target_file = $target_dir . basename($finalname);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
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
?>



<link rel="stylesheet" type="text/css" href="css/home.css">
<!-- Google Fonts -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fredoka+One">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic">
	<link rel="stylesheet" type="text/css" href="/fonts/map-icons/css/map-icons.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/icomoon/style.css">



  <div class="content">
            <div class="container"><!-- .header -->
<!-- Common Header Ends here -->
        

			<!-- START: PAGE CONTENT -->
				
				
<section id="about" class="section section-about">
					<div class="animate-up">
	<div class="section-box">
							<div class="profile">
								<div class="row">
									<div class="col-xs-5">
										<div class="profile-photo">
<?php
$imgpath1="files/pp/".$_SESSION['login_user'].".png";
$imgpath2="files/pp/".$_SESSION['login_user'].".jpg";
$imgpath3="files/pp/".$_SESSION['login_user'].".gif";
if(@getimagesize($imgpath1) || @getimagesize($imgpath2) || @getimagesize($imgpath3))
{
  if(@getimagesize($imgpath1)) {
  echo "<img src='$imgpath1' alt=''/>";
}
if(@getimagesize($imgpath2)) {
   echo "<img src='$imgpath2' alt=''/>";
    }
if(@getimagesize($imgpat3)) {
  echo "<img src='$imgpath3' alt=''/>";
}
}
else 
if(!@getimagesize($imgpath1) && !@getimagesize($imgpath2) && !@getimagesize($imgpath3))
{
  $imgpathn="files/pp/system.jpg";     echo "<img src='$imgpathn' alt=''/>";    //if image not found this will display 
}

?>


<br><form method="post" action="" enctype="multipart/form-data" >
<input type="hidden" name="sub" value="1">
         <input name="fileToUpload" id="dp" type="file" required="required"/><button type="submit" name="Submit" value="Submit" id="Submit" tclass="submit" style="padding:5px;padding-top,padding-bottom:3px;" >New <i class="fa fa-camera-retro"></i></button> </form>
       
</div>
									</div>
									<div class="col-xs-7">
										<div class="profile-info">
											<div class="profile-preword"><span>Hello</span></div>
											<h1 class="profile-title"><span>I'm</span> <?php echo  $_SESSION['userfname']." "; echo $_SESSION['userlname']; ?></h1>

											<h2 class="profile-position">Developer and businessman</h2></div>
											<dl class="profile-list">
												<dt>Emails Sent</dt>
												<dd><?php echo $_SESSION['user_total']; ?></dd>
<dt>Balance</dt>
												<dd><?php echo $_SESSION['user_balance']; ?></dd>
												<dt>Address</dt>
												<dd><?php echo $_SESSION['user_address']; echo ", "; echo $_SESSION['user_city']; echo ", "; echo $_SESSION['user_country']; ?></dd>
												<dt>E-mail</dt>
												<dd><a href="mailto:<?php echo $_SESSION['useremail']; ?>"><?php echo $_SESSION['useremail']; ?></a></dd>
												<dt>Phone</dt>
												<dd><a href="tel:+91<?php echo $_SESSION['user_tel']; ?>">+91 <?php echo $_SESSION['user_tel']; ?></a></dd>
												
												<dt class="profile-vacation"><span>Busy</span></dt>
												<dd class="profile-vacation">till April 5, 2016</dd>
											</dl>
									</div>
								</div>
							</div>
							<br>
						</div>
						<div class="profile-btn">
	<a class="btn btn-border ripple" href="recharge.php">Recharge Account</a>
						</div>
						
						
					</div>	
				</section><br><br> 
						
						
						<!-- #about -->