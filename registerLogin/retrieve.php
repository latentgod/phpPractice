<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title></title>
</head>
<body>
<form action="checkRetrieve.php" method="post" name = "formLogin">
<div class="register">
	<div class="registerTitle">找回密码</div>
	<div class="registerList">
		<ul>
			<li><label>用户名&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<input type="text" name = "registerUsername"></label></li>
			<li><label>你的爱好 <input type="text" name="registerHobby" ></label></li>
		</ul>
	</div>
	<div class="registerBottom">
		<ul>
			<li style="padding-left:170px;"><button type="submit" name = "retrievePassword">找回密码</button></li>
		</ul>
	</div>
</div>
</form>





<?php include_once '../layout/footer.php'?>
