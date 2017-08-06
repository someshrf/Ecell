<!DOCTYPE html>
<html>
 <head>
   <link rel="stylesheet" type="text/css" href="delstyle.css"> 
 </head>
<body>

<?php
// Enter your Host, username, password, database below.
session_start();
$username="root";
$servername="localhost";
$password="";
$dbname="ecell";
$errors=array();
 
$db = mysqli_connect('localhost','root','','ecell');

//registration
   if(isset($_POST['register'])){
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phone = mysqli_real_escape_string($db, $_POST['phone_1']);
    $email = mysqli_real_escape_string($db, $_POST['email_1']);
    $dept = mysqli_real_escape_string($db, $_POST['dept']);
    $year = mysqli_real_escape_string($db, $_POST['year']);

   include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
   
//captcha system

   $securimage = new Securimage();

   if ($securimage->check($_POST['captcha_code']) == false) {
    echo "The security code entered was incorrect.<br /><br/>";
    echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
  exit;
}
 
//upload files
$filename = $_FILES['resume']['name'];
$tmpname = $_FILES['resume']['tmp_name'];
$fp = fopen($tmpname,'r');
$content = fread($fp,filesize($tmpname)); 
$filecon = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
  $filename=addslashes($filename);
}

//adding records

 if(empty($errors)) {
    $sql ="INSERT INTO users (name,phone,email,dept,year,filename,filecon) VALUES ('$username','$phone','$email','$dept','$year','$filename','$filecon')";
    mysqli_query($db,$sql);
    ?>
    <p style="color:green;">Registered Successfully</p>
  <?php
    }
  }
  
?>
 </body>
</html>
