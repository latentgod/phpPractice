<?php
include_once '../conn/connect.php';
$username = trim($_POST["registerUsername"]);
$password =trim( $_POST["registerPassword"]);
$ip = $_POST["registerIp"];
$hobby = trim($_POST["hobby"]);
$create_at = date("Y-m-d h:i:s");
$sqlRegister = "insert into `user`(username,password,hobby,ip,create_at) values (\"$username\",\"$password\",\"$hobby\",\"$ip\",\"$create_at\");";
if(!mysql_query($sqlRegister,$con)){
	echo "insert failed";
	die('Error: ' . mysql_error());
}
//registered successfully, save some infos to session
session_start();
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;


//close sql
mysql_close($con);
header("Location:../front/index.php");  








?>
