<?php
session_start();
if(trim($_SESSION['admin']) == ""){?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title></title>
</head>
<body>
<form action="verify.php" method="post" name = "formLogin">
<div class="register">
	<div class="registerTitle">登录</div>
	<div class="registerList">
		<ul>
			<li><label>管理员&nbsp;&nbsp;&nbsp; <input type="text" name = "registerUsername"></label></li>
			<li><label>密码 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="registerPassword" ></label></li>
		</ul>
	</div>
	<div class="registerBottom">
		<ul>
			<li><button type="submit" style="margin-left:100px" name = "login">登录</button></li>
		</ul>
	</div>
</div>
</form>
<?php  include_once '../layout/footer.php'; }
else{ 

header("Location:./content.php");
}
?>
