<?php session_start();
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
	   <span class="title"><a href="content.php">课室后台</a></span>
		    <ul class = "navlist">
				<li id="<?php print(("content.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="content.php" >内容管理</a></li>
			 	<li id="<?php print(("user.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="user.php" >用户管理</a></li>
				<li id="<?php print(("comment.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="comment.php" >评论管理</a></li>
				<li id="<?php print(("system.php" == basename($_SERVER['PHP_SELF']))? "active" : "")?>" ><a href="system.php" >系统管理</a></li>
                    <?php if(isset($_SESSION['admin'])){
		 echo "	<li style=\"width:82px;padding-left:0px\" ><a style=\"color:green;width:82px;text-align:center\" href=\"\">".cut_str($_SESSION['admin'],4)."</a></li>";
		 echo "	<li  style=\"width:82px;padding-left:0px\"><a style=\"width:82px;text-align:center\" href=\"../registerLogin/logout.php\" >退出</a></li>";
}


?>
			</ul>
    </div>
