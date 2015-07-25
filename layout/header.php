<?php
session_start();
include_once '../cutString.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title></title>
</head>
<body>
		<div class="nav">
			<span class="title"><a href="../front/index.php">信安课室</a></span>
				<ul class = "navlist">
					<li id="<?php print(("index.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="../front/index.php" >首页</a></li>
					<li id="<?php print(("secure.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="../front/secure.php" >网络安全</a></li>
					<li id="<?php print(("php.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="../front/php.php" >PHP</a></li>
					<li id="<?php print(("chat.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="../front/chat.php" >闲聊</a></li>
                    <?php if(isset($_SESSION['username'])){
		 echo "	<li style=\"width:82px;padding-left:0px\" ><a style=\"color:green;width:82px;text-align:center\" href=\"\" >".cut_str($_SESSION['username'],4)."</a></li>";
		 echo "	<li  style=\"width:82px;padding-left:0px\"><a style=\"width:82px;text-align:center\" href=\"../registerLogin/logout.php\" >退出</a></li>";
}
else{
    echo "<li style=\"width:82px;padding-left:0px\"><a style=\"width:82px;text-align:center\" href=\"../registerLogin/register.php\" target=\"_blank\">注册</a></li>";
	echo "<li style=\"width:82px;padding-left:0px\"><a  href=\"../registerLogin/login.php\" style=\"width:82px;text-align:center\" target=\"_blank\">登录</a></li>";
}


?>
				</ul>
		</div>
<?php 
/*
	<div class="main">
		<div class="main-left">left</div>
		<div class="main-right">right </div>
	</div>
 */
?>








