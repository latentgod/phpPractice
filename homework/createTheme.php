<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<script src = "js/jquery-1.11.3.min.js" ></script>
	<script src = "js/myjs.js" ></script>
	<title></title>
</head>
<body>
	<div class = "create">
	<p class="createTitle">发帖</p>
	<form action="saveTheme.php" method="post">
	<div class="createBody">
		<ul>
			<li>分类</li>
				<label>	<input type="radio" name="category" value="secure" /> 网络安全</label>
				<label>	<input type="radio" name="category" value="php" /> PHP</label>
				<label>	<input type="radio" name="category" value="chat" /> 闲聊</label>
			<li>标题</li>
			<input style="height:25px;width:665px;" type="text" id = "title" name = "title">
			<li>内容</li>
				<textarea rows="15" cols="50" id="body" name= "body"></textarea>
		</ul>
		<button type="submit" onclick = "return checkNewTheme()" >提交</button>
	</div>
		<input type="hidden"  name = "themeIp" value = "<?php echo $_SERVER["REMOTE_ADDR"]; ?>">
		<input type="hidden"  name = "username" value = "<?php echo $_SESSION["username"]; ?>">
	</form>

	</div>
<?php include_once 'layout/footer.php'?>
