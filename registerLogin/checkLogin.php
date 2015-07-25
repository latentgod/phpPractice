<?php session_start();?>
<?php
if(isset($_POST['login'])){
include_once '../conn/connect.php';
$username =trim( $_POST["registerUsername"]);
$password =trim( $_POST["registerPassword"]);
$loginSql = "select * from user where username='".$username."'and password='".$password."';"; 
$result = mysql_query($loginSql,$con) or die(mysql_error());
$row = mysql_fetch_array($result);
if(empty($row)){
	echo "<script>alert(\"用户名或密码错误\");</script>";
	echo "<script>window.location.href='login.php'</script>";  
    return false;
	exit;
}
else{
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
mysql_close($con);
header("Location:../front/index.php");  
}
}

?>
