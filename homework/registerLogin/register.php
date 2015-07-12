<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title></title>
</head>
<body>
<form action="saveRegister.php" method="post" name = "formRegister">
<div class="register">
	<div class="registerTitle">注册</div>
	<div class="registerList">
		<ul>
			<li><label>用户名&nbsp;&nbsp;&nbsp; <input type="text" id = "username" name = "registerUsername"></label></li>
            <div id = "usernameWarnNotify" style = "font-size:13px;color:red;display:none">该用户名已被注册</div>
            <div id = "usernameEmptyNotify" style = "font-size:13px;color:red;display:none">用户名不能为空</div>
            <div id = "usernameNotify" style = "font-size:13px;color:green;display:none">该用户名可用</div>
			<li><label>密码 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" id = "registerPassword" name="registerPassword" ></label></li>
            <div id = "passwordEmptyNotify" style = "font-size:13px;color:red;display:none">密码不能为空</div>
			<li><label>确认密码<input type="password" id = "confirmRegisterPassword" name = "confirmRegisterPassword"></li>
            <div id = "differenNotify" style = "font-size:13px;color:red;display:none">两次密码不一致</div>
            <li><label>你的爱好<input type="text" id= "hobby" name = "hobby"></li>
            <div id = "hobbyEmptyNotify" style = "font-size:13px;color:red;display:none">爱好不能为空</div>
            <span style="font-size:13px;color:red">(*用于找回密码,很重要)</span>
		</ul>
		<input type="hidden"  name = "registerIp" value = "<?php echo $_SERVER["REMOTE_ADDR"]; ?>">
		
	</div>
	<div class="registerBottom">
		<ul>
			<li><a href="../registerLogin/login.php">已有帐号. . .</a></li>
			<li><button type="submit" id = "register" name = "register" onclick= "return checkRegister()" >注册</button></li>
		</ul>
	</div>
</div>
</form>





<?php include_once '../layout/footer.php'?>
