<?php
include_once '../conn/connect.php';
$title = trim($_POST["title"]);
$id = trim($_POST["id"]);
$body =trim( $_POST["body"]);
//$ip = $_POST["themeIp"];
$category = trim($_POST["category"]);
//$username = trim($_POST["username"]);
$create_at = trim($_POST["create_at"]);
$sql = "update `content` set title='$title' ,body ='$body',create_at='$create_at',category='$category' where id ='$id'";

if(!mysql_query($sql,$con)){
	echo $sql;
	die('Error: ' . mysql_error());
}
mysql_close($con);
header("Location:../front/$category.php");  




?>
