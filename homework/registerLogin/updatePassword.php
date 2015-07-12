<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title></title>
</head>
<body>
<form action="checkUpdate.php" method="post" name = "formLogin">
<div class="register">
	<div class="registerTitle">更改密码</div>
	<div style="margin-top:20px;color:green">用户:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['username']; ?></div>
	<div class="registerList">
		<ul>
			<li><label>新密码 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" id = "newPassword" name="newPassword" ></label></li>
			<li><label>确认密码&nbsp;&nbsp; <input type="password" id= "confirmNewPassword"></label></li>
            <div id = "retrieveEmptyNotify" style = "font-size:13px;color:red;display:none">不能为空</div>
            <div id = "retrieveDifferenNotify" style = "font-size:13px;color:red;display:none">密码不一致</div>
		</ul>
	</div>
	<div class="registerBottom">
		<ul>
			<li style="padding-left:150px"><button type="submit" name = "updatePassword" onclick="return checkNewPassword()" >更改密码</button></li>
		</ul>
	</div>
</div>
</form>

<?php include_once '../layout/footer.php'?>
