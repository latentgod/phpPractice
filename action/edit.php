<?php 
session_start();
include_once ("../conn/connect.php");
$id = $_GET['id'];
$sql = "select * from content where id = $id";
$result = mysql_query($sql,$con) or die("连接数据库失败");
$row = mysql_fetch_array($result) or die ("查询失败");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<script src = "../js/jquery-1.11.3.min.js" ></script>
	<script src = "../js/myjs.js" ></script>
	<title></title>
</head>
<body>
	<div class = "create">
	<p class="createTitle">编辑</p>
	<form action="update.php" method="post">
	<div class="createBody">
		<ul>
			<li>分类</li>
			<label>	<input type="radio" name="category" value="secure"<?php print(("secure" == $row[6])? "checked=\"true\"" : "")?> /> 网络安全</label>
			<label>	<input type="radio" name="category" value="php" <?php print(("php" == $row[6])? "checked=\"true\"" : "")?> /> PHP</label>
			<label>	<input type="radio" name="category" value="chat" <?php print(("chat" == $row[6])? "checked=\"true\"" : "")?> /> 闲聊</label>
			<li>标题</li>
			<input style="height:25px;width:665px;" type="text" id = "editTitle" name = "title" value="<?php echo $row[1];?>">
			<li>内容</li>
			<textarea rows="15" cols="50" id="editBody" name= "body" ><?php echo $row[2]?></textarea>
		</ul>
		<button type="submit" onclick = "return checkEditTheme()" >提交</button>
	</div>
		<input type="hidden"  name = "themeIp" value = "<?php echo $_SERVER["REMOTE_ADDR"]; ?>">
		<input type="hidden"  name = "username" value = "<?php echo $row[5]; ?>">
		<input type="hidden"  name = "create_at" value = "<?php echo $row[3]; ?>">
		<input type="hidden"  name = "id" value = "<?php echo $row[0]; ?>">
	</form>

	</div>
<div style="margin:0px auto;width:1000px;overflow:float"><?php include_once '../layout/footer.php'?></div>
