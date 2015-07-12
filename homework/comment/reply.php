<?php
include_once '../conn/connect.php';
$username = trim($_POST["replyUsername"]);
$id = trim($_POST["replyId"]);
$comment =trim( $_POST["replyBody"]);
$ip = $_POST["replyIp"];
$create_at = date("Y-m-d h:i:s");
$sql = "insert into `comment`(comment,comment_id,create_at,user,ip) values (\"$comment\",\"$id\",\"$create_at\",\"$username\",\"$ip\");";
if(!mysql_query($sql,$con)){
	echo "insert failed";
	die('Error: ' . mysql_error());
}
//registered successfully, save some infos to session


//close sql
mysql_close($con);

$url = $_POST["url"];
header("Location:".$url);  







?>
