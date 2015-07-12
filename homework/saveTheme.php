<?php
include_once './conn/connect.php';
$title = trim($_POST["title"]);
$body =trim( $_POST["body"]);
$ip = $_POST["themeIp"];
$category = trim($_POST["category"]);
$username = trim($_POST["username"]);
$create_at = date("Y-m-d h:i:s");
$sql = "insert into `content`(title,body,create_at,ip,user,category) values (\"$title\",\"$body\",\"$create_at\",\"$ip\",\"$username\",\"$category\");";

if(!mysql_query($sql,$con)){
	echo "insert failed";
	die('Error: ' . mysql_error());
}
mysql_close($con);
header("Location:front/$category.php");  




?>
