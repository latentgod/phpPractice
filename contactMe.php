<?php
include_once 'conn/connect.php';
$sql = "select * from system "; 
$result = mysql_query($sql,$con) or die(mysql_error());
$row = mysql_fetch_array($result);
if(empty($row)){
	exit;
}
else{
mysql_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title></title>
</head>
<body>
	<div style="background-color:#fff;text-algin:center;padding-bottom:20px;margin:0px auto;width:1000px;height:100px">
	<table style="width:300px;text-align:center;margin-left:300px;margin-bottom:20px;"border="1px">
	<tr>
		<td>邮箱</td>
		<td><?php  echo $row[5]?></td>
	</tr>
	<tr>
		<td>手机号码</td>
		<td><?php  echo $row[6]?></td>
	</tr>
</table>
<?php include_once 'layout/footer.php' ?>
	
	</div>
</body>
</html>
