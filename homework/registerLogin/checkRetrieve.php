<?php
session_start();
if(isset($_POST['registerUsername']) && isset($_POST['registerHobby'])){
	include_once '../conn/connect.php';
	$registerUsername = trim($_POST['registerUsername']);
	$registerSql = "select * from user where username ='$registerUsername'";
	$result = mysql_query($registerSql,$con);
	if(empty(mysql_fetch_array($result))){
		echo "<script>alert(\"该用户不存在\")</script>";
		echo "<script>window.location.href=\"retrieve.php\"</script>";
		exit;
	}
	$registerHobby = trim($_POST['registerHobby']);
	$registerSql = "select * from user where hobby ='$registerHobby' and username ='$registerUsername'";
	$result = mysql_query($registerSql,$con);
	if(empty(mysql_fetch_array($result))){
		echo "<script>alert(\"爱好填写错误\")</script>";
		echo "<script>window.location.href=\"retrieve.php\"</script>";
		exit;
	}
	$_SESSION['username'] = $registerUsername;
	echo "<script>window.location.href=\"updatePassword.php\"</script>";
}







?>
