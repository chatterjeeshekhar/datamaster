<?php
require_once 'admin/excel/excelreader.php';
require 'web/connect.php';
include 'session.php';

//Add reader.php to uploadfile.php and don't forget to add db connection file.

// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setOutputEncoding('CP1251');

@$target_file = $_FILES['fileToUpload']['tmp_name'];
$data->read($target_file);   // $target_file will be your excel file path

for ($x=1; $x<=count($data->sheets[0]["cells"]); $x++) {

   $name = $data->sheets[0]["cells"][$x][1];

   $price = $data->sheets[0]["cells"][$x][2];
$email = $data->sheets[0]["cells"][$x][3];
$mobile  = $data->sheets[0]["cells"][$x][4];
$other = $data->sheets[0]["cells"][$x][5];
$stat = $data->sheets[0]["cells"][$x][6];
$cat = $data->sheets[0]["cells"][$x][7];




   $sql = "INSERT INTO dblist (name,price,email,mobile,other,stat,cat)

       VALUES ('$name','$price','$email','$mobile', $other, $stat, $cat)";

 
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
   mysqli_query($con,$sql);

}
?>