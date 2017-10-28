<?php
include 'session.php';
 include 'web/connect.php';
 $connection = mysqli_connect($servername1, $username1, $password1, $dbname1);
$usern = $_POST['usern'];
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$useremail = $_POST['useremail'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$tel = $_POST['tel'];

$result111 = mysqli_query($connection,"SELECT SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,18) AS RES");
$row111 = mysqli_fetch_assoc($result111);
$randapi = $row111['RES'];

$sql ="insert into login (username, password, lastlogin, fname, lname, email, address, city, country, tel, registerlog, active, apikey) values ('$usern','$pass', (NOW() + INTERVAL '$tz' MINUTE), '$fname', '$lname', '$useremail', '$address', '$city', '$country', '$tel', (NOW() + INTERVAL '$tz' MINUTE), 'Y', '$randapi');";

$retval = mysqli_query($connection,$sql);


echo mysql_error();
echo "<font color='green' face='Arial'><h3>User Created Successfully</h3></font>";

$target_dir = "files/id/";
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


?>