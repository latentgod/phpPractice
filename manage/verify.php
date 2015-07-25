<?php session_start();?>
<?php
if(isset($_POST['login'])){
include_once '../conn/connect.php';
$username =trim( $_POST["registerUsername"]);
$password =trim( $_POST["registerPassword"]);
$loginSql = "select * from admin where username='".$username."'and password='".$password."';"; 
$result = mysql_query($loginSql,$con) or die(mysql_error());
$row = mysql_fetch_array($result);
if(empty($row)){
	echo "<script>alert(\"用户名或密码错误\");</script>";
	echo "<script>window.location.href='index.php'</script>";  
	exit;
}
else{
$_SESSION['admin'] = $username;
$_SESSION['pwd'] = $password;
mysql_free_result($result);
mysql_close($con);
header("Location:./content.php");  
}
}

?>
