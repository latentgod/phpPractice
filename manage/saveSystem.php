<?php
include_once '../conn/connect.php';
$title = trim($_POST["title"]);
$keywords =trim( $_POST["keywords"]);
$version = trim($_POST["version"]);
$phone = trim($_POST["phone"]);
$email =trim( $_POST["email"]);
$recode = trim($_POST["recode"]);
//$sqlRegister = "update `system`(title,keywords,version,recode,email,phone) values (\"$title\",\"$keywords\",\"$version\",\"$recode\",\"$email\",\"$phone\");";
$sql = "update system set title = '$title',keywords='$keywords',version='$version',phone='$phone',email='email',recode='$recode' where id = '1' ";
if(!mysql_query($sql,$con)){
	die('Error: ' . mysql_error());
}
//close sql
mysql_close($con);
header("Location:system.php");  



?>
