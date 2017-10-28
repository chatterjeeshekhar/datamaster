require_once 'reader.php';
require 'web/connect.php';

//Add reader.php to uploadfile.php and don't forget to add db connection file.

// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setOutputEncoding('CP1251');

$data->read($target_file);   // $target_file will be your excel file path

for ($x = 2; $x < = count($data->sheets[0]["cells"]); $x++) {

   $name = $data->sheets[0]["cells"][$x][1];

   $extension = $data->sheets[0]["cells"][$x][2];

   $email = $data->sheets[0]["cells"][$x][3];

   $sql = "INSERT INTO mytable (name,extension,email)

       VALUES ('$name',$extension,'$email')";

   echo $sql."\n";

   mysql_query($sql);

}