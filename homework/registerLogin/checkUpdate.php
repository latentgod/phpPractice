<?php
session_start();
include_once '../conn/connect.php';
$username =trim( $_SESSION['username']);
$newPassword = trim($_POST['newPassword']);
$updateSql = "update user set password = '$newPassword' where username = '$username' ";
$result = mysql_query($updateSql,$con);
if(!empty(mysql_fetch_array($result))){
	echo "<script>alert(\"修改密码失败\")</script>";
	echo "<script>window.location.href=\"updatePassword.php\"</script>";
	exit;
}
echo "<script>window.location.href=\"../front/index.php\"</script>";









?>
